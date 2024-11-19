<?php

namespace App\Models;

use CodeIgniter\Model;

class DSAModel extends Model
{
    protected $table = 'dsa_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['full_name', 'email', 'phone', 'address', 'city', 'zip_code', 'otp', 'otp_expiry', 'created_at'];

    // Define rules for form validation
    public function validationRules()
    {
        return [
            'full_name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[dsa_users.email]',
            'phone' => 'required|numeric|min_length[10]|max_length[15]',
            'address' => 'required',
            'city' => 'required|max_length[50]',
            'zip_code' => 'required|numeric|min_length[5]|max_length[10]',
        ];
    }
}
