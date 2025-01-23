<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'kd_transaksi'; // Primary key tetap 'kd_transaksi'
    protected $allowedFields = ['tanggal', 'nota', 'metode_bayar', 'status','job_id'];
    

    public function updateStatus($kd_transaksi, $status)
{
    // Update status berdasarkan kd_transaksi
    return $this->where('kd_transaksi', $kd_transaksi)
                ->set(['status' => $status])
                ->update();
}


}

