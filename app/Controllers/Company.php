<?php

namespace App\Controllers;

use App\Models\CompanyProfileModel;

class Company extends BaseController
{
    protected $companyModel;

    public function __construct()
    {
        $this->companyModel = new CompanyProfileModel();
    }

    public function profile()
    {
        $data = [
            'company' => $this->companyModel->where('user_id', user_id())->first(),
        ];
        // dd($data['company']);
        return view('company/profile', $data);
    }

    public function edit()
    {
        $data = [
            'company' => $this->companyModel->where('user_id', user_id())->first(),
        ];
        // dd($data['company']);
        return view('company/edit', $data);
    }

    public function create()
    {
        $validation = [
            'logo'   => 'max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/company/profile/edit')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $logo = $this->request->getFile('logo');
            $nameLogo = $logo->getRandomName();
            $logo->move('assets2/company', $nameLogo);

            $this->companyModel->insert([
                'user_id' => user()->id,
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tanggal_berdiri' => $this->request->getPost('tanggal_berdiri'),
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
                'website' => $this->request->getPost('website'),
                'logo' => $nameLogo,
                'rekening' => $this->request->getPost('rekening'),
                'bank' => $this->request->getPost('bank'),
                'no_dompet' => $this->request->getPost('no_dompet'),
                'dompet' => $this->request->getPost('dompet'),
            ]);

            session()->setFlashdata('message', 'Berhasil update data');
            return redirect()->to('/company/profile');
        }
    }

    public function update($id)
{
    $validation = [
        'logo'   => 'max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
    ];

    if (!$this->validate($validation)) {
        return redirect()->to('/company/profile/edit')->withInput()->with('errors', $this->validator->getErrors());
    } else {
        $logo = $this->request->getFile('logo');
        $logoLama = $this->request->getVar('logo_lama');

        // Check apakah ada file baru yang di-upload
        if ($logo->getError() == 4) { // Tidak ada file baru
            $namaLogo = $logoLama;
        } else { // Ada file baru
            $namaLogo = $logo->getRandomName();
            $logo->move('assets2/company', $namaLogo);

            // Hapus file lama jika ada
            $pathLogoLama = 'assets2/company/' . $logoLama;
            if ($logoLama && file_exists($pathLogoLama)) {
                unlink($pathLogoLama);
            }
        }

        // Update data di database
        $this->companyModel->update($id, [
            'user_id' => user()->id,
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal_berdiri' => $this->request->getPost('tanggal_berdiri'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'website' => $this->request->getPost('website'),
            'logo' => $namaLogo,
            'rekening' => $this->request->getPost('rekening'),
            'bank' => $this->request->getPost('bank'),
            'no_dompet' => $this->request->getPost('no_dompet'),
            'dompet' => $this->request->getPost('dompet'),
            

        ]);

        session()->setFlashdata('message', 'Berhasil update data');
        return redirect()->to('/company/profile');
    }
}

    public function getApplicantByJobId($job_id)
{
    // Ambil data detail pelamar pekerjaan dari database
    $applicant = $this->jobModel->getApplicantByJobId($job_id);
    
    // Tampilkan view dan kirim data
    return view('company/job-apply/detail', ['applicant' => $applicant]);
}

}
