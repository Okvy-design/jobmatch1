<?php

namespace App\Controllers;

// use App\Controllers\BaseController;
use App\Models\FreelancerModel;
use App\Models\CompanyProfileModel;
use App\Models\TransactionModel;

class Laporan extends BaseController
{
    public function freelance()
    {
        $freelancerModel = new FreelancerModel();
        $data['freelancers'] = $freelancerModel->getFreelancersWithUser();
        return view('admin/laporan/freelance', $data);
    }

    public function company()
    {
        $companyModel = new CompanyProfileModel();
        $data['companies'] = $companyModel->findAll();
        return view('admin/laporan/company', $data);
    }

    public function transaksi()
{
    $transactionModel = new \App\Models\TransactionModel();

    $transactions = $transactionModel
        ->select('
            transaction.kd_transaksi, 
            transaction.tanggal, 
            transaction.status, 
            jobs.title as project_name, 
            company_profile.nama_perusahaan as company_name, 
            company_profile.rekening as rekening_pengirim, 
            users.email as freelancer_email, 
            freelancers.rekening as rekening_penerima, 
            jobs.budget
        ')
        ->join('jobs', 'jobs.job_id = transaction.job_id')
        ->join('applicants', 'applicants.job_id = jobs.job_id')
        ->join('users', 'users.id = applicants.freelancer_id')
        ->join('freelancers', 'freelancers.user_id = users.id')
        ->join('company_profile', 'company_profile.user_id = jobs.company_id')
        ->findAll();

    return view('admin/laporan/transaksi', [
        'transactions' => $transactions
    ]);
}

    public function cetakFreelance()
    {
        $freelancerModel = new FreelancerModel();
    
        // Jika cetak individu
        $id = $this->request->getPost('id');
        if ($id) {
            $freelancer = $freelancerModel->getFreelancersWithUser($id);
            if (!$freelancer) {
                return redirect()->to('/admin/laporan/freelance')->with('error', 'Data freelancer tidak ditemukan');
            }
            $data['freelancers'] = [$freelancer]; // Bungkus dalam array agar tetap kompatibel dengan tampilan
        } else {
            // Jika cetak semua
            $data['freelancers'] = $freelancerModel->getFreelancersWithUser();
        }
    
        return view('admin/laporan/cetak_freelance', $data);
    }

    public function cetakCompany()
{
    $companyModel = new CompanyProfileModel();

    // Jika cetak individu
    $id = $this->request->getPost('id');
    if ($id) {
        $company = $companyModel->find($id);
        if (!$company) {
            return redirect()->to('/admin/laporan/company')->with('error', 'Data perusahaan tidak ditemukan');
        }
        $data['companies'] = [$company]; // Bungkus dalam array agar tetap kompatibel dengan tampilan
    } else {
        // Jika cetak semua
        $data['companies'] = $companyModel->findAll();
    }

    return view('admin/laporan/cetak_company', $data);
}

public function cetakTransaksi()
{
    $transactionModel = new TransactionModel();

    // Jika cetak individu
    $id = $this->request->getPost('id');
    if ($id) {
        $transaction = $transactionModel
            ->select('
                transaction.kd_transaksi, 
                transaction.tanggal, 
                transaction.status, 
                jobs.title as project_name, 
                company_profile.nama_perusahaan as company_name, 
                company_profile.rekening as rekening_pengirim, 
                users.email as freelancer_email, 
                freelancers.rekening as rekening_penerima, 
                jobs.budget
            ')
            ->join('jobs', 'jobs.job_id = transaction.job_id')
            ->join('applicants', 'applicants.job_id = jobs.job_id')
            ->join('users', 'users.id = applicants.freelancer_id')
            ->join('freelancers', 'freelancers.user_id = users.id')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->where('transaction.kd_transaksi', $id)
            ->first();

        if (!$transaction) {
            return redirect()->to('/admin/laporan/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        $data['transactions'] = [$transaction]; // Bungkus dalam array agar tetap kompatibel dengan tampilan
    } else {
        // Jika cetak semua
        $data['transactions'] = $transactionModel
            ->select('
                transaction.kd_transaksi, 
                transaction.tanggal, 
                transaction.status, 
                jobs.title as project_name, 
                company_profile.nama_perusahaan as company_name, 
                company_profile.rekening as rekening_pengirim, 
                users.email as freelancer_email, 
                freelancers.rekening as rekening_penerima, 
                jobs.budget
            ')
            ->join('jobs', 'jobs.job_id = transaction.job_id')
            ->join('applicants', 'applicants.job_id = jobs.job_id')
            ->join('users', 'users.id = applicants.freelancer_id')
            ->join('freelancers', 'freelancers.user_id = users.id')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->findAll();
    }

    return view('admin/laporan/cetak_transaksi', $data);
}

    

}
