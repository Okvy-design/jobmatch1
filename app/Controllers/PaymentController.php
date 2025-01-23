<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ApplicantModel;
use App\Models\JobModel;
use Dompdf\Dompdf;


class PaymentController extends BaseController
{
    protected $transactionModel;
    protected $applicantModel;
    protected $jobModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->applicantModel = new ApplicantModel();
        $this->jobModel = new JobModel();
    }

    public function print($kd_transaksi)
{
    // Ambil data transaksi
    $transaction = $this->transactionModel->find($kd_transaksi);

    // Ambil detail applicant dan job yang terkait dengan transaksi
    $applicant = $this->applicantModel->getDetailApplicantForJob($transaction['job_id'], $kd_transaksi);
   //  $job = $this->jobModel->find($transaction['job_id']);
    $job = $this->jobModel->findJobWithCompany($transaction['job_id']);

    
    // Pastikan Anda menambahkan nama_perusahaan dan data lainnya yang diperlukan
    $data = [
        'transaction' => $transaction,
        'applicant' => $applicant,
        'job' => $job,
        'nama_perusahaan' => $job['nama_perusahaan'],  // Ambil nama perusahaan dari job
        'freelancer_name' => $applicant['freelancer_name'], // Ambil nama freelancer dari applicant
        'freelancer_email' => $applicant['freelancer_email'], // Ambil email freelancer dari applicant
        'budget' => $job['budget'],  // Budget dari job
        'deadline' => $job['deadline'],  // Deadline dari job
        'proposal' => $applicant['proposal'],  // Proposal dari applicant
        'metode_bayar' => $transaction['metode_bayar'],  // Metode bayar dari transaksi
    ];

    // Load view untuk tampilan PDF
    $html = view('company/payment/print', $data);

    // Generate PDF menggunakan Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output PDF ke browser
    $dompdf->stream("invoice_{$kd_transaksi}.pdf", array("Attachment" => false));
}


    // Tampilkan daftar transaksi
    public function index()
    {
        $data['transactions'] = $this->transactionModel->findAll();
        return view('company/payment/index', $data);
    }

    // Tampilkan form create
    public function create()
    {
        return view('company/payment/create');
    }

    // Simpan transaksi baru
   
    public function store()
    {
        $data = [
            'job_id' => $this->request->getPost('job_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'status' => 'pending', // Status default
        ];
    
        $this->transactionModel->save($data);
        return redirect()->to('company/payment')->with('success', 'Transaction created successfully.');
    }
    
    
    public function edit($kd_transaksi)
    {
        // Cari transaksi berdasarkan kd_transaksi
        $data['transaction'] = $this->transactionModel->find($kd_transaksi);
    
        // Jika transaksi tidak ditemukan, kembalikan ke daftar transaksi dengan pesan error
        if (!$data['transaction']) {
            return redirect()->to(base_url('company/payment'))->with('error', 'Transaction not found.');
        }
    
        // Tampilkan view edit dengan data transaksi
        return view('company/payment/edit', $data);
    }
    
    
    public function update($kd_transaksi)
    {
        $file = $this->request->getFile('nota');
        $transaction = $this->transactionModel->find($kd_transaksi);
    
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('assets2/nota', $fileName);
    
            // Hapus file lama
            if ($transaction['nota'] && file_exists('assets2/nota/' . $transaction['nota'])) {
                unlink('assets2/nota/' . $transaction['nota']);
            }
        } else {
            $fileName = $transaction['nota']; // Gunakan file lama jika tidak ada file baru
        }
    
        // Update data ke database tanpa mengubah status
        $this->transactionModel->update($kd_transaksi, [
            'tanggal' => $this->request->getPost('tanggal'),
            'nota' => $fileName,
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            // 'status' tidak disertakan agar tidak bisa diubah oleh user
        ]);
    
        return redirect()->to(base_url('company/payment'))->with('success', 'Transaction updated successfully!');
    }
    
    // Hapus transaksi
    public function delete($kd_transaksi)
    {
        $transaction = $this->transactionModel->find($kd_transaksi);

        if ($transaction['nota'] && file_exists('assets2/nota/' . $transaction['nota'])) {
            unlink('assets2/nota/' . $transaction['nota']);
        }

        $this->transactionModel->delete($kd_transaksi);
        return redirect()->to(base_url('company/payment'))->with('success', 'Transaction deleted successfully!');
    }
}
