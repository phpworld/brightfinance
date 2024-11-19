<?php

namespace App\Controllers;

use App\Models\DSAModel;
use CodeIgniter\Controller;

class DsaController extends Controller
{
    
    public function index()
    {
        // Load the DSA view
        return view('dsa/index');
    }
        
    public function register()
    {
        // Load the DSA view
        return view('dsa/register');
    }
    
    public function login()
    {
        // Load the DSA view
        return view('dsa/login');
    }
    
   public function dashboard(){
     
    return view('dsa/dashboard');
        }
    
   
    public function submit()
    {
        $validation = \Config\Services::validation();

        $input = $this->request->getPost();

        // Validation Rules
        $validation->setRules([
            'full_name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[dsa_users.email]',
            'phone' => 'required|numeric|min_length[10]|max_length[15]',
            'address' => 'required|min_length[5]',
            'city' => 'required|min_length[2]',
            'zip_code' => 'required|numeric|min_length[5]|max_length[10]',
        ]);

        if (!$validation->run($input)) {
            return view('dsa_register_form', ['validation' => $validation]);
        }

        // Save to Database
        $DSAModel = new DSAModel();
        $data = [
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'city' => $input['city'],
            'zip_code' => $input['zip_code'],
        ];

        $DSAModel->insert($data);

        return redirect()->to('/dsa/register')->with('success', 'DSA registration successful!');
    }

        
    /////////////////
    
    
    public function verifyOtp()
    {
        $email = $this->request->getPost('email');
        $otp = $this->request->getPost('otp');

        $dsaUserModel = new DSAModel();

        // Validate OTP
        $user = $dsaUserModel->where('email', $email)->first();

        if (!$user || $user['otp'] !== $otp || strtotime($user['otp_expiry']) < time()) {
            return redirect()->back()->with('error', 'Invalid or expired OTP.');
        }

        // OTP is valid, proceed with login
        session()->set('logged_in_user', $user);

        return redirect()->to('/dsa/dashboard')->with('success', 'Login successful!');
    }
    
    //////////
    
    public function sendOtp()
{
    $email = $this->request->getPost('email');
     $dsaUserModel = new DSAModel();

    // Check if the email exists in the database
    $user = $dsaUserModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email not found.');
    }

    // Generate OTP
    $otp = random_int(100000, 999999);
    $otpExpiry = date('Y-m-d H:i:s', strtotime('+15 minutes')); // OTP valid for 15 minutes

    // Save OTP and expiry time in the database
    $dsaUserModel->update($user['id'], [
        'otp' => $otp,
        'otp_expiry' => $otpExpiry,
    ]);

    // Send Email
    $emailService = \Config\Services::email();
    $emailService->setTo($email);
    $emailService->setFrom('your_email@example.com', 'Your App Name');
    $emailService->setSubject('Your OTP Code');
    $emailService->setMessage("Your OTP code is: $otp\nIt is valid for 15 minutes.");

    if (!$emailService->send()) {
        log_message('error', $emailService->printDebugger(['headers']));
        return redirect()->back()->with('error', 'Failed to send OTP. Please try again.');
    }

    return redirect()->back()->with('success', 'OTP sent to your email.');
}

    
    
    
}
