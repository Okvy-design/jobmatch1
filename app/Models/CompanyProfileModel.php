<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyProfileModel extends Model
{
    protected $table      = 'company_profile';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['user_id', 'nama_perusahaan', 'deskripsi', 'tanggal_berdiri', 'alamat', 'telepon', 'website', 'logo','rekening','bank','no_dompet','dompet'];
    

    public function countAll()
    {
        return $this->countAllResults();
    }
}
