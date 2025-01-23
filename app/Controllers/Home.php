<?php

namespace App\Controllers;

use App\Models\ApplicantModel;
use App\Models\JobModel;

class Home extends BaseController
{
    protected $jobModel, $applicantModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->applicantModel = new ApplicantModel();
    }

    public function index(): string
    {
        return view('index');
    }

    public function cari_job()
    {
        $data = [
            'jobs' => $this->jobModel->getAllJobs(),
        ];
        // dd($data['jobs']);
        return view('pages/cari-job', $data);
    }

    public function apply($id)
    {
        $data = [
            'job' => $this->jobModel->where('job_id', $id)->first(),
            'app' => $this->applicantModel->where('freelancer_id', user_id())->where('job_id', $id)->first(),
        ];
        dd($data['app']);
        return view('pages/apply', $data);
    }

    public function apply_store($id)
    {
        $this->applicantModel->insert([
            'job_id' => $id,
            'freelancer_id' => user_id(),
            'proposal' => $this->request->getPost('proposal'),
            'applied_at' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('message', 'Berhasil apply job');
        return redirect()->to('/freelancer/applied-job');
    }
}
