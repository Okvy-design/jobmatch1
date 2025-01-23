<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Transaksi extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $transaksi = $this->transactionModel->getAllTransactions(); // Mengambil semua data transaksi
        $data = [
            'transaksi' => $transaksi // Mengirim data transaksi ke view
        ];

        return view('admin/transaksi', $data); // Memuat view dengan data
    }

    public function updateStatus($kd_transaksi)
{
    $this->transactionModel->updateStatus($kd_transaksi, 'paid'); // Status langsung diatur menjadi "paid".
    return redirect()->to('admin/transaksi')->with('success', 'Transaction status updated successfully');
}

}
