<?php

namespace App\Models;

use CodeIgniter\Model;

class FreelancerModel extends Model
{
    protected $table      = 'freelancers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['user_id', 'bio', 'skills', 'telepon', 'alamat', 'tanggal_lahir', 'portfolio', 'foto','bank','rekening'];
   
    
    // new
    public function countAll()
    {
        return $this->countAllResults();
    }
    
 // Fungsi untuk mendapatkan data freelancer dengan data user terkait
 public function getFreelancersWithUser()
 {
     return $this->select('freelancers.*, users.email, users.username')
         ->join('users', 'users.id = freelancers.user_id')
         ->findAll();
 }
   
}
