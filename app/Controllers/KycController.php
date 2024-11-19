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
    // Load validation service
    $validation = \Config\Services::validation();

    // Set validation rules
    $validation->setRules([
        'full_name' => 'required|min_length[3]',
        'dob' => 'required|valid_date',
        'gender' => 'required',
        'address' => 'required|min_length[10]',
        'phone' => 'required|numeric|min_length[10]',
        'email' => 'required|valid_email',
        'company_name' => 'required|min_length[3]',
        'registration_number' => 'required|min_length[8]',
        'document_path' => 'uploaded[document_path]|mime_in[document_path,image/jpg,image/jpeg,image/png,application/pdf]|max_size[document_path,2048]',
        'selfie_path' => 'uploaded[selfie_path]|mime_in[selfie_path,image/jpg,image/jpeg,image/png]|max_size[selfie_path,2048]',
        'address_proof_path' => 'uploaded[address_proof_path]|mime_in[address_proof_path,image/jpg,image/jpeg,image/png,application/pdf]|max_size[address_proof_path,2048]'
    ]);

    // Run validation
    if (!$validation->withRequest($this->request)->run()) {
        return view('kyc_form', ['validation' => $validation]);
    }

    // Initialize model and form data
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

    // Upload directory path
    $uploadsDir = 'uploads/';

    // Ensure directories exist
    if (!is_dir($uploadsDir . 'documents/')) {
        mkdir($uploadsDir . 'documents/', 0777, true);
    }
    if (!is_dir($uploadsDir . 'selfies/')) {
        mkdir($uploadsDir . 'selfies/', 0777, true);
    }

    // Document upload (identity proof)
    $documentUpload = $this->request->getFile('document_path');
    if ($documentUpload && $documentUpload->isValid() && !$documentUpload->hasMoved()) {
        $documentPath = $documentUpload->getRandomName();
        $documentUpload->move($uploadsDir . 'documents/', $documentPath);
        $formData['document_path'] = 'documents/' . $documentPath;
    }

    // PAN / Additional documents upload
    $additionalDocumentUpload = $this->request->getFile('additional_documents_path');
    if ($additionalDocumentUpload && $additionalDocumentUpload->isValid() && !$additionalDocumentUpload->hasMoved()) {
        $additionalDocumentsPath = $additionalDocumentUpload->getRandomName();
        $additionalDocumentUpload->move($uploadsDir . 'documents/', $additionalDocumentsPath);
        $formData['additional_documents_path'] = 'documents/' . $additionalDocumentsPath;
    }

    // Address proof upload
    $addressProofUpload = $this->request->getFile('address_proof_path');
    if ($addressProofUpload && $addressProofUpload->isValid() && !$addressProofUpload->hasMoved()) {
        $addressProofPath = $addressProofUpload->getRandomName();
        $addressProofUpload->move($uploadsDir . 'documents/', $addressProofPath);
        $formData['address_proof_path'] =  'documents/' . $addressProofPath;
    }

    // Selfie / Passport size photo upload
    $selfieUpload = $this->request->getFile('selfie_path');
    if ($selfieUpload && $selfieUpload->isValid() && !$selfieUpload->hasMoved()) {
        $selfiePath = $selfieUpload->getRandomName();
        $selfieUpload->move($uploadsDir . 'selfies/', $selfiePath);
        $formData['selfie_path'] =  'selfies/' . $selfiePath;
    }

    // Save the form data to the database
    $kycModel->insert($formData);

    // Prepare and send email
    $adminEmail = 'info@exportmarket.in';
    $email = \Config\Services::email();
    $email->setFrom('info@exportmarket.in', 'KYC Form Submission');
    $email->setTo($adminEmail);
    $email->setSubject('New KYC Form Submission');
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
////////// Submit function close 

public function mail_fail()
{
	 return view('mail_failed');
	
}
////////////// FAIL MAIL /////
/*
public function view_kyc_data()
    {
        $model = new KycModel();
        
        // Limit the number of records, e.g., to 10
        $data['kycForms'] = $model->orderBy('created_at', 'DESC')->findAll(10);

        return view('kyc_view', $data);
    }
	*/
	
	public function view_kyc_data()
    {
        $model = new KycModel();
        
        // Load pagination library
        $pager = \Config\Services::pager();

        // Get the current page number
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Set the number of records per page
        $perPage = 10;

        // Get the total number of records
        $totalRecords = $model->countAll();

        // Get the records for the current page
        $data['kycForms'] = $model->orderBy('created_at', 'DESC')->paginate($perPage);

        // Create pagination links
        $data['pager'] = $model->pager;

        // Pass total records to the view if needed
        $data['totalRecords'] = $totalRecords;

        return view('kyc_view', $data);
    }
		
///////////// View KYC ///////////

public function view_admin_kyc_data()
    {
        $model = new KycModel();
        
        // Load pagination library
        $pager = \Config\Services::pager();

        // Get the current page number
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Set the number of records per page
        $perPage = 10;

        // Get the total number of records
        $totalRecords = $model->countAll();

        // Get the records for the current page
        $data['kycForms'] = $model->orderBy('created_at', 'DESC')->paginate($perPage);

        // Create pagination links
        $data['pager'] = $model->pager;

        // Pass total records to the view if needed
        $data['totalRecords'] = $totalRecords;

        return view('admin/kyc_view', $data);
    }

//////////////////////////////////
public function view_full_kyc($id)
    {
        $model = new KycModel();
        $data['kycForm'] = $model->find($id);

        return view('kyc_detail_view', $data);
    }
/////////////////
public function view_admin_full_kyc($id)
    {
        $model = new KycModel();
        $data['kycForm'] = $model->find($id);

        return view('admin/kyc_detail_view', $data);
    }

//////////////////////////

	public function search_kyc_data()
	{
		return view('search_kyc');
	}
	
	public function search_admin_kyc_data()
	{
		return view('admin/search_kyc');
	}


/////////////////////

public function search_kyc()
{
    $model = new KycModel();

    // Get the search query from the request
    $searchEmail = $this->request->getVar('email');
    $searchPhone = $this->request->getVar('phone');

    // Define how many records per page
    $perPage = 10;

    // If both email and phone are provided, filter results
    if (!empty($searchEmail) && !empty($searchPhone)) {
        $data['kycForms'] = $model->where('email', $searchEmail)
                                   ->where('phone', $searchPhone)
                                   ->orderBy('created_at', 'DESC')
                                   ->paginate($perPage, 'default');
    } else {
        // If no search is performed or only one of the fields is filled, display all records
        $data['kycForms'] = $model->orderBy('created_at', 'DESC')
                                   ->paginate($perPage, 'default');
    }

    // Get pagination links
    $data['pager'] = $model->pager;

    return view('kyc_view', $data); // Return to the same view with the data
}
///////////////////


public function search_admin_kyc()
{
    $model = new KycModel();

    // Get the search query from the request
    $searchEmail = $this->request->getVar('email');
    $searchPhone = $this->request->getVar('phone');

    // Define how many records per page
    $perPage = 10;

    // If both email and phone are provided, filter results
    if (!empty($searchEmail) && !empty($searchPhone)) {
        $data['kycForms'] = $model->where('email', $searchEmail)
                                   ->where('phone', $searchPhone)
                                   ->orderBy('created_at', 'DESC')
                                   ->paginate($perPage, 'default');
    } else {
        // If no search is performed or only one of the fields is filled, display all records
        $data['kycForms'] = $model->orderBy('created_at', 'DESC')
                                   ->paginate($perPage, 'default');
    }

    // Get pagination links
    $data['pager'] = $model->pager;

    return view('admin/kyc_view', $data); // Return to the same view with the data
}


////////////////////

}
