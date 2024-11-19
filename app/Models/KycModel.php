<?php

namespace App\Models;

use CodeIgniter\Model;

class KycModel extends Model
{
    protected $table      = 'kyc_forms';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'full_name', 'dob', 'gender', 'address', 'phone', 'email',
        'company_name', 'registration_number', 'company_address', 'company_phone', 
        'company_email', 'nature_of_business', 'document_path', 'additional_documents_path', 
        'address_proof_path', 'selfie_path'
    ];
}
