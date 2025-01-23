<?php

namespace App\Controllers;

use App\Models\FreelancerModel;

class Freelancer extends BaseController
{
    protected $freelancerModel;

    public function __construct()
    {
        $this->freelancerModel = new FreelancerModel();
    }

    public function profile(): string
    {
        $data = [
            'profile' => $this->freelancerModel->where('user_id', user_id())->first(),
        ];
        return view('freelancer/profile', $data);
    }

    public function edit()
    {
        $data = [
            'profile' => $this->freelancerModel->where('user_id', user_id())->first(),
        ];
        return view('freelancer/edit', $data);
    }

    public function create()
    {
        $validation = [
            'foto' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ];
        // Validasi Input
        if (!$this->validate($validation)) {
            return redirect()->to('/freelancer/profile/edit')->withInput()->with('errors', $this->validator->getErrors());
        } else {
        // Jika validasi berhasil
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('assets2/freelancer', $namaFoto);

        $this->freelancerModel->insert([
            'user_id' => user_id(),
            'bio' => $this->request->getPost('bio'),
            'skills' => $this->request->getPost('skills'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'portfolio' => $this->request->getPost('portofolio'),
            'bank' => $this->request->getPost('bank'),
            'rekening' => $this->request->getPost('rekening'),
            'foto' => $namaFoto,
        ]);

        session()->setFlashdata('message', 'Berhasil menambahkan data');
        return redirect()->to('/freelancer/profile');
    }
}

    public function update($id)
    {
        // Validasi Input
        if (!$this->validate([
            'skills' => 'required',
            'bio' => 'required|max_length[500]',
            'telepon' => 'required|numeric',
            'tanggal_lahir' => 'required|valid_date',
            'alamat' => 'required|max_length[255]',
            'bank' => 'required|max_length[255]',
            'rekening' => 'required|max_length[255]',
            'portofolio' => 'required|valid_url',
            'foto' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ])) {
            // Jika validasi gagal
            return redirect()->to('/freelancer/profile/edit')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi berhasil
        $foto = $this->request->getFile('foto');
        $fotoLama = $this->request->getVar('fotoLama');

        // Cek apakah ada file baru yang diupload
        if ($foto->getError() == 4) {
            $namaFoto = $fotoLama;
        } else {
            $namaFoto = $foto->getRandomName();
            $foto->move('assets2/freelancer', $namaFoto);
            // Hapus foto lama jika ada
            if (is_file('assets2/freelancer/' . $fotoLama)) {
                unlink('assets2/freelancer/' . $fotoLama);
            }
        }

        $this->freelancerModel->update($id, [
            'bio' => $this->request->getPost('bio'),
            'skills' => $this->request->getPost('skills'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'portfolio' => $this->request->getPost('portofolio'),
            'foto' => $namaFoto,
            'bank' => $this->request->getPost('bank'),
            'rekening' => $this->request->getPost('rekening'),
        ]);

        session()->setFlashdata('message', 'Berhasil memperbarui data');
        return redirect()->to('/freelancer/profile');
    }
    
}
