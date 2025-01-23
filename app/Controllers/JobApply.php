<?php

namespace App\Controllers;

use App\Models\ApplicantModel;
use App\Models\JobModel;
use Dompdf\Dompdf;
use Dompdf\Options;


class JobApply extends BaseController
{
    protected $applicantModel, $jobModel;

    public function __construct()
    {
        $this->applicantModel = new ApplicantModel();
        $this->jobModel = new JobModel();
    }

    



    public function index($id)
    {
        $data = [
            'apps' => $this->applicantModel->getAllApplicantForCompany($id),
            'job' => $this->jobModel->where('job_id', $id)->first(),
        ];
        // dd($data['apps']);
        return view('company/job-apply/index', $data);
    }

    public function acc()
    {
         // Validasi input
         $freelancer_id = $this->request->getPost('freelancer');
         $job_id = $this->request->getPost('job');
 
         // Update status pelamar
         $updated = $this->applicantModel->updateStatus($freelancer_id, $job_id);
 
         if ($updated) {
            return redirect()->back()->with('message', 'Freelancer diterima, dan status lainnya telah diperbarui.');
         } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
         }
    }

    public function jobDetail($job_id, $applicant_id)
    {
        $applicantModel = new \App\Models\ApplicantModel();
    
        $data['applicant'] = $applicantModel->getDetailApplicantForJob($job_id, $applicant_id);
        $data['job_id'] = $job_id; // Tambahkan job_id ke data yang dikirim ke view
    
        if (!$data['applicant']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data tidak ditemukan.");
        }
    
        return view('company/job-apply/detail', $data);
    }
    

public function detail($job_id, $applicant_id)
{
    $applicantModel = new \App\Models\ApplicantModel();
    $jobModel = new \App\Models\JobModel();

    // Dapatkan data pekerjaan dan pelamar
    $applicant = $applicantModel->getDetailApplicantForJob($job_id, $applicant_id);
    $job = $jobModel->find($job_id);

    if (!$applicant || !$job) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
    }

    return view('company/job-apply/detail', [
        'job' => $job,
        'applicant' => $applicant,
    ]);
}


}