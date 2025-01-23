<?php

namespace App\Controllers;

use App\Models\ApplicantModel;

class AppliedJob extends BaseController
{
    protected $applicantModel;

    public function __construct()
    {
        $this->applicantModel = new ApplicantModel();
    }

    public function index()
    {
        $data = [
            'applicants' => $this->applicantModel->getAllApplicantFreelancer(user_id()),
        ];
        return view('freelancer/applied/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'app' => $this->applicantModel->getDetailApplicantFreelancer(user_id(), $id)
        ];
        return view('freelancer/applied/detail', $data);
    }
    

    public function finished()
    {
        $data = [
            'jobs' => $this->applicantModel->getFinishedJobs(user_id()), // Menggunakan fungsi dari ApplicantModel
        ];
        return view('freelancer/finished', $data);
    }
    public function upload($applicant_id)
{
    $file = $this->request->getFile('file');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Tentukan direktori penyimpanan
        $path = WRITEPATH . '../public/assets2/berkas/';
        
        // Pastikan direktori ada
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        
        // Simpan berkas dengan nama unik
        $newName = $file->getRandomName();
        $file->move($path, $newName);

        // Simpan nama file ke database
        $this->applicantModel->update($applicant_id, 
        ['dokumen' => $newName,
        'tanggal_upload' => date('Y-m-d H:i:s'),]

        );

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    return redirect()->back()->with('error', 'Failed to upload file.');
}

}
