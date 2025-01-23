<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicantModel extends Model
{
    protected $table      = 'applicants';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['job_id', 'freelancer_id', 'proposal','dokumen', 'status','payment_status' ,'tanggal_upload','applied_at'];

    public function getAllApplicantFreelancer($freelancer_id)
    {
        return $this->db->table('applicants')
            ->select('applicants.id, applicants.status, jobs.title, jobs.budget, jobs.deadline, company_profile.nama_perusahaan')
            ->join('jobs', 'jobs.job_id = applicants.job_id')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->where('freelancer_id', $freelancer_id)
            ->orderBy('applicants.id', 'DESC')
            ->get()->getResultArray();
    }

    public function getDetailApplicantFreelancer($freelancer_id, $applicant_id)
    {
        return $this->db->table('applicants')
            ->select('applicants.*, jobs.job_id, jobs.title, jobs.budget, jobs.deadline, jobs.foto, jobs.description, jobs.requirements, company_profile.nama_perusahaan')
            ->join('jobs', 'jobs.job_id = applicants.job_id')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->where('freelancer_id', $freelancer_id)
            ->where('applicants.id', $applicant_id)
            ->orderBy('applicants.id', 'DESC')
            ->get()->getRowObject();
    }

    public function getAllApplicantForCompany($job_id)
    {
        return $this->db->table('applicants')
            ->select('applicants.*, users.username, users.email')
            ->join('users', 'users.id = applicants.freelancer_id')
            ->where('job_id', $job_id)
            ->orderBy('applicants.id', 'DESC')
            ->get()->getResultArray();
    }

   

    public function getFinishedJobs($freelancer_id)
    {
        return $this->db->table('applicants')
            ->select('jobs.title, company_profile.nama_perusahaan as company, jobs.budget, jobs.deadline, applicants.id as applicant_id, applicants.dokumen')
            ->join('jobs', 'jobs.job_id = applicants.job_id')
            ->join('company_profile', 'company_profile.user_id = jobs.company_id')
            ->where('applicants.freelancer_id', $freelancer_id)
            ->where('applicants.status', 'accepted')
            ->orderBy('jobs.deadline', 'ASC')
            ->get()->getResultArray();
    }
    
    public function updateStatus(int $freelancer_id, int $job_id): bool
    {
        // Start transaction
        $this->db->transStart();

        // Set status 'rejected' for all freelancers who applied for the same job
        $this->where('job_id', $job_id)
             ->set('status', 'rejected')
             ->update();

        // Set status 'accepted' for the selected freelancer
        $this->where('freelancer_id', $freelancer_id)
             ->where('job_id', $job_id)
             ->set('status', 'accepted')
             ->update();

        // Complete transaction
        $this->db->transComplete();

        return $this->db->transStatus();
    }
    public function getDetailApplicantForJob($job_id, $applicant_id)
    {
        return $this->db->table('applicants')
            ->select('applicants.*, jobs.title as job_title, jobs.description, jobs.budget, jobs.deadline, users.username as freelancer_name, users.email as freelancer_email')
            ->join('jobs', 'jobs.job_id = applicants.job_id')
            ->join('users', 'users.id = applicants.freelancer_id')
            ->where('applicants.job_id', $job_id)
            ->where('applicants.id', $applicant_id)
            ->get()->getRowArray();
    }
    

}
