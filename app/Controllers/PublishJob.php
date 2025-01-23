<?php

namespace App\Controllers;

use App\Models\ApplicantModel;
use App\Models\JobModel;

class PublishJob extends BaseController
{
    protected $jobModel, $applicantModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->applicantModel = new ApplicantModel();
    }

    public function index()
    {
        $data = [
            'jobs' => $this->jobModel->where('company_id', user_id())->findAll(),
        ];
        return view('company/publish-job/index', $data);
    }

    public function create()
    {
        return view('company/publish-job/create');
    }

    public function store()
    {
        $validation = [
            'foto'   => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/company/publish-job/create')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $foto = $this->request->getFile('foto');
            $nameFoto = $foto->getRandomName();
            $foto->move('assets2/jobs', $nameFoto);

            $this->jobModel->insert([
                'company_id' => user_id(),
                'title' => $this->request->getPost('judul'),
                'description' => $this->request->getPost('deskripsi'),
                'requirements' => $this->request->getPost('persyaratan'),
                'budget' => $this->request->getPost('budget'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => 'open',
                'foto' => $nameFoto,
            ]);

            session()->setFlashdata('message', 'Berhasil publish job');
            return redirect()->to('/company/publish-job');
        }
    }

    public function show($id)
    {
        $data = [
            'job' => $this->jobModel->where('job_id', $id)->first(),
            'total_apply' => $this->applicantModel->where('job_id', $id)->findAll(),
        ];

        return view('company/publish-job/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'job' => $this->jobModel->where('job_id', $id)->first(),
        ];

        return view('company/publish-job/edit', $data);
    }

    public function update($id)
    {
        $validation = [
            'foto'   => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/company/publish-job/update')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $foto = $this->request->getFile('foto');
            $fotoLama = $this->request->getVar('foto_lama');

            // check foto
            if ($foto->getError() == 4) {
                $namaFoto = $fotoLama;
            } else {
                $namaFoto = $foto->getRandomName();
                $foto->move('assets2/company', $namaFoto);
                unlink('assets2/company' . $fotoLama);
            }

            $this->jobModel->update($id, [
                'title' => $this->request->getPost('judul'),
                'description' => $this->request->getPost('deskripsi'),
                'requirements' => $this->request->getPost('persyaratan'),
                'budget' => $this->request->getPost('budget'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => 'open',
                'foto' => $namaFoto,
            ]);

            session()->setFlashdata('message', 'Berhasil update data');
            return redirect()->to('/company/publish-job');
        }
    }

    public function delete($id)
    {
        $this->jobModel->delete($id);
        session()->setFlashdata('message', 'Berhasil hapus data');
        return redirect()->to('/company/publish-job');
    }

    public function close($id)
    {
        $this->jobModel->update($id, [
            'status' => 'closed',
        ]);

        return redirect()->back()->with('message', 'Job ini telah ditutup');
    }
}
