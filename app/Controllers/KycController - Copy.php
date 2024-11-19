<?php

namespace App\Controllers;

use App\Models\KycModel;
use CodeIgniter\Controller;
use Config\Services;

class KycController extends Controller
{
    public function index()
    {
        return view('kyc_form');
    }
    
    public function submit()
    {   
	
	    $validation = Services::validation();

        // Set validation rules
        $validation->setRules([
            'fullName' => 'required|min_length[3]',
            'dob' => 'required|valid_date',
            'gender' => 'required',
            'address' => 'required|min_length[10]',
            'phone' => 'required|numeric|min_length[10]',
            'email' => 'required|valid_email',
            'companyName' => 'required|min_length[3]',
            'registrationNumber' => 'required|min_length[8]',
            'document_path' => 'uploaded[document_path]|mime_in[document_path,image/jpg,image/jpeg,image/png,application/pdf]|max_size[document_path,2048]',
            'selfieUpload' => 'uploaded[selfieUpload]|mime_in[selfieUpload,image/jpg,image/jpeg,image/png]|max_size[selfieUpload,2048]',
            'addressProofUpload' => 'uploaded[addressProofUpload]|mime_in[addressProofUpload,image/jpg,image/jpeg,image/png,application/pdf]|max_size[addressProofUpload,2048]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('kyc_form', ['validation' => $this->validator]);
        }
	
        
       //echo "<pre>";
	   //print_r($formData);
	  // die();
  $kycModel = new KycModel();
        $formData = [
            'full_name' => $this->request->getPost('full_name'),
            'dob' => $this->request->getPost('dob'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'company_name' => $this->request->getPost('company_name'),
            'registration_number' => $this->request->getPost('registration_number'),
            'company_address' => $this->request->getPost('company_address'),
            'company_phone' => $this->request->getPost('company_phone'),
            'company_email' => $this->request->getPost('company_email'),
            'nature_of_business' => $this->request->getPost('nature_of_business'),
        ];


        // Handle file uploads (documents and selfie)
        $uploadsDir = WRITEPATH . 'uploads/';

        // Document upload (identity proof)
        $documentUpload = $this->request->getFile('document_path');
        if ($documentUpload && $documentUpload->isValid() && !$documentUpload->hasMoved()) {
            $documentPath = $uploadsDir . 'documents/' . $documentUpload->getRandomName();
            $documentUpload->move($uploadsDir . 'documents/', $documentPath);
            $formData['document_path'] = $documentPath;
        }

        // PAN / Additional documents upload
        $additionalDocumentUpload = $this->request->getFile('additional_documents_path');
        if ($additionalDocumentUpload && $additionalDocumentUpload->isValid() && !$additionalDocumentUpload->hasMoved()) {
            $additionalDocumentsPath = $uploadsDir . 'documents/' . $additionalDocumentUpload->getRandomName();
            $additionalDocumentUpload->move($uploadsDir . 'documents/', $additionalDocumentsPath);
            $formData['additional_documents_path'] = $additionalDocumentsPath;
        }

        // Address proof upload
        $addressProofUpload = $this->request->getFile('address_proof_path');
        if ($addressProofUpload && $addressProofUpload->isValid() && !$addressProofUpload->hasMoved()) {
            $addressProofPath = $uploadsDir . 'documents/' . $addressProofUpload->getRandomName();
            $addressProofUpload->move($uploadsDir . 'documents/', $addressProofPath);
            $formData['address_proof_path'] = $addressProofPath;
        }

        // Selfie / Passport size photo upload
        $selfieUpload = $this->request->getFile('selfie_path');
        if ($selfieUpload && $selfieUpload->isValid() && !$selfieUpload->hasMoved()) {
            $selfiePath = $uploadsDir . 'selfies/' . $selfieUpload->getRandomName();
            $selfieUpload->move($uploadsDir . 'selfies/', $selfiePath);
            $formData['selfie_path'] = $selfiePath;
        }


// Save the form data to the database
      

       echo "<pre>";
	   print_r($formData);
	   die();


        // Save the data in the database
        $kycModel->insert($formData);

        // Prepare email with attachments to the admin
        $adminEmail = 'admin@yourcompany.com'; // Admin's email address
        $email = Services::email();
        $email->setFrom('no-reply@yourcompany.com', 'KYC Form Submission');
        $email->setTo($adminEmail);
        $email->setSubject('New KYC Form Submission');

        // Email body (you can customize this)
        $emailBody = "
            <p>A new KYC form has been submitted. Here are the details:</p>
            <ul>
                <li>Full Name: {$formData['full_name']}</li>
                <li>Date of Birth: {$formData['dob']}</li>
                <li>Company Name: {$formData['company_name']}</li>
                <li>Registration Number: {$formData['registration_number']}</li>
                <li>Phone: {$formData['phone']}</li>
                <li>Email: {$formData['email']}</li>
            </ul>
        ";

        $email->setMessage($emailBody);

        // Attach files to the email
        if (isset($formData['document_path'])) {
            $email->attach($formData['document_path']);
        }

        if (isset($formData['additional_documents_path'])) {
            $email->attach($formData['additional_documents_path']);
        }

        if (isset($formData['address_proof_path'])) {
            $email->attach($formData['address_proof_path']);
        }

        if (isset($formData['selfie_path'])) {
            $email->attach($formData['selfie_path']);
        }

        // Send email
        if ($email->send()) {
            return redirect()->to('kyc/success')->with('status', 'Form submitted and email sent successfully.');
        } else {
            return redirect()->to('kyc/failure')->with('status', 'Form submitted, but email failed.');
        }
    }
}
