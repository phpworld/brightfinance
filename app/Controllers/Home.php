<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    
    ////////////
    
     public function success()
    {
        return view('kyc_success');
    }
    
    public function failure()
    {
        return view('kyc_failure');
    }
    
    ///////////////////
    
   public function submit()
    {
        // Load the session service
        $session = \Config\Services::session();
        
        // Load email service
        $email = \Config\Services::email();

        // Collect form data
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $userEmail = $this->request->getPost('email');
        $loanType = $this->request->getPost('loan_type');
        $amount = $this->request->getPost('amount');
        $message = $this->request->getPost('message');

        // Set up email configuration
        $email->setFrom('info@exportmarket.in', 'Your Finance Company');
        $email->setTo('info@exportmarket.in');  // Replace with admin's email

        // Compose the email with HTML header and footer
        $email->setSubject('New Contact Form Submission');
        $emailContent = "
                        <1>Full Name: $name</p>
                        <2>Phone: $phone</p>
                        <3>Email: $userEmail</p>
                        <4>Loan Type: $loanType</p>
                        <5>Loan Amount: $amount</p>
                        <6>Message: $message</p>
                    ";

        // Set the email message as HTML
        $email->setMessage($emailContent);

        // Send the email and set flash message
        if ($email->send()) {
            $session->setFlashdata('message', 'Your message has been sent successfully!');
            $session->setFlashdata('alert-class', 'alert-success');
        } else {
            $session->setFlashdata('message', 'Failed to send your message. Please try again.');
            $session->setFlashdata('alert-class', 'alert-danger');
        }

        // Redirect back to the form
        return redirect()->to('/');
    }
    
    /////////////////////////
    
    
}
