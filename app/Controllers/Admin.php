<?php

namespace App\Controllers;
use App\Models\FreelancerModel;
use App\Models\CompanyProfileModel;

class Admin extends BaseController
{
    public function login()
    {
        // Cek apakah user sudah login
        if (logged_in() && in_groups('admin')) {
            return redirect()->to('/admin/dashboard');
        }

        // Tampilkan halaman login khusus admin
        return view('admin/login');
    }

    public function attemptLogin()
    {
        // Proses login seperti biasa di MythAuth
        if (!$this->validate([
            'email' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Gunakan Auth untuk login
        $auth = service('authentication');
        $success = $auth->attempt([
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ]);

        if ($success && in_groups('admin')) {
            return redirect()->to('/admin/dashboard');
        }

        // Tampilkan pesan kesalahan jika login gagal atau bukan admin
        return redirect()->back()->withInput()->with('error', 'Login gagal atau Anda bukan admin.');
    }

    public function company()
{
    // Load model
    $companyModel = new CompanyProfileModel();

    // Ambil semua data dari tabel company_profile
    $companies = $companyModel->findAll();

    // Kirim data ke view
    return view('admin/company', [
        'companies' => $companies
    ]);
}

public function freelancer()
{
    $freelancerModel = new FreelancerModel();

    // Ambil data freelancer dengan join ke tabel users
    $freelancers = $freelancerModel->getFreelancersWithUser();

    // Kirim data ke view
    return view('admin/freelance', [
        'freelancers' => $freelancers
    ]);
}

    public function index()
    {
        $freelancerModel = new FreelancerModel();
        $companyModel = new CompanyProfileModel();

        // Get total number of freelancers and companies
        $totalFreelancers = $freelancerModel->countAll();
        $totalCompanies = $companyModel->countAll();

        // Pass data to the view
        return view('admin/index', [
            'totalFreelancers' => $totalFreelancers,
            'totalCompanies' => $totalCompanies
        ]);
    }
    public function transaksi()
    {
        $transactionModel = new \App\Models\TransactionModel();
    
        $transactions = $transactionModel->select('transaction.kd_transaksi, transaction.nota, transaction.status, jobs.title as project_name, company_profile.nama_perusahaan as company_name, users.email as freelancer_email, jobs.budget')
            ->join('jobs', 'jobs.job_id = transaction.job_id')
            ->join('applicants', 'applicants.job_id = jobs.job_id')
            ->join('users', 'users.id = applicants.freelancer_id')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->findAll();
    
        return view('admin/transaksi', [
            'transactions' => $transactions
        ]);
    }
    
    public function updateStatus($kd_transaksi)
    {
        $transactionModel = new \App\Models\TransactionModel();
        $transactionModel->updateStatus($kd_transaksi, 'paid');
    
        return redirect()->to('/admin/transaksi')->with('success', 'Transaction status updated successfully.');
    }
    
    public function detail()
    {
      
        return view('admin/detail');
    }
}
