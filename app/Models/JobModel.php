<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table      = 'jobs';
    protected $primaryKey = 'job_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['company_id', 'title', 'description', 'requirements', 'budget', 'deadline', 'status', 'foto'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    public function findJobWithCompany($job_id)
{
    return $this->db->table('jobs')
        ->select('jobs.*, company_profile.nama_perusahaan')
        ->join('company_profile', 'company_profile.user_id = jobs.company_id')
        ->where('jobs.job_id', $job_id)
        ->get()->getRowArray(); // Mengambil satu baris data
}


    public function getAllJobs(){
        return $this->db->table('jobs')
            ->select('jobs.*, company_profile.nama_perusahaan, company_profile.logo')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->get()->getResultArray();
    }
}
