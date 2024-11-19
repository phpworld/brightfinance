<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bright Finance KYC Application Form </title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .stepper .step {
            text-align: center;
            flex: 1;
        }
        .stepper .step .circle {
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #e0e0e0;
            border-radius: 50%;
            color: white;
            display: inline-block;
            margin-bottom: 10px;
        }
        .stepper .step.active .circle {
            background-color: #007bff;
        }
        .stepper .step.completed .circle {
            background-color: #28a745;
        }
        .stepper .step .label {
            color: #6c757d;
        }
        .stepper .step.active .label {
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="container mb-5 pb-5	">
    <h2 class="text-center mt-5 ">Bright Finance KYC Application Form </h2>

    <!-- Stepper -->
    <div class="stepper">
        <div class="step active" id="step-1">
            <div class="circle">1</div>
            <div class="label">Personal KYC</div>
        </div>
        <div class="step" id="step-2">
            <div class="circle">2</div>
            <div class="label">Company KYC</div>
        </div>
        <div class="step" id="step-3">
            <div class="circle">3</div>
            <div class="label">Documents</div>
        </div>
        <div class="step" id="step-4">
            <div class="circle">4</div>
            <div class="label">Selfie</div>
        </div>
        <div class="step" id="step-5">
            <div class="circle">5</div>
            <div class="label">Stamp Duty Agreement</div>
        </div>
    </div>

    <form action="<?=base_url('/kyc/submit');?>" method="POST" enctype="multipart/form-data">
        <!-- Personal KYC -->
        <div class="tab-content" id="personal-kyc">
            <h3>Personal KYC</h3>
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="full_name" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="123 Main St" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+123456789" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
            </div>
            <button type="button" class="btn btn-primary next-step" data-next="#company-kyc">Next</button>
        </div>

        <!-- Company KYC -->
        <div class="tab-content hidden" id="company-kyc">
            <h3>Company KYC</h3>
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Company ABC Ltd." required>
            </div>
            <div class="mb-3">
                <label for="registrationNumber" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="registrationNumber" name="registration_number" placeholder="12345678" required>
            </div>
            <div class="mb-3">
                <label for="companyAddress" class="form-label">Company Address</label>
                <input type="text" class="form-control" id="companyAddress" name="company_address" placeholder="456 Corporate Blvd" required>
            </div>
            <div class="mb-3">
                <label for="companyPhone" class="form-label">Company Phone Number</label>
                <input type="tel" class="form-control" id="companyPhone" name="company_phone" placeholder="+987654321" required>
            </div>
            <div class="mb-3">
                <label for="companyEmail" class="form-label">Company Email Address</label>
                <input type="email" class="form-control" id="companyEmail" name="company_email" placeholder="info@company.com" required>
            </div>
            <div class="mb-3">
                <label for="natureOfBusiness" class="form-label">Nature of Business</label>
                <input type="text" class="form-control" id="natureOfBusiness" name="nature_of_business" placeholder="Manufacturing" required>
            </div>
            <button type="button" class="btn btn-secondary prev-step" data-prev="#personal-kyc">Previous</button>
            <button type="button" class="btn btn-primary next-step" data-next="#documents">Next</button>
        </div>

        <!-- Documents Upload -->
        <div class="tab-content hidden" id="documents">
            <h3>Documents</h3>
            <div class="mb-3">
                <label for="documentUpload" class="form-label">Upload Identity Proof (Aadhar)</label>
                <input type="file" class="form-control" id="documentUpload" name="document_path" required>
            </div>
            <div class="mb-3">
                <label for="additionalDocumentUpload" class="form-label">Upload PAN Documents</label>
                <input type="file" class="form-control" id="additionalDocumentUpload" name="additional_documents_path" multiple>
            </div>
            <div class="mb-3">
                <label for="addressProofUpload" class="form-label">Upload Address Proof (Bank Statement / Credit Card Statement)</label>
                <input type="file" class="form-control" id="addressProofUpload" name="address_proof_path" required>
            </div>
            <button type="button" class="btn btn-secondary prev-step" data-prev="#company-kyc">Previous</button>
            <button type="button" class="btn btn-primary next-step" data-next="#selfie">Next</button>
        </div>

        <!-- Selfie Upload -->
        <div class="tab-content hidden" id="selfie">
            <h3>Selfie</h3>
            <div class="mb-3">
                <label for="selfieUpload" class="form-label">Upload a Selfie / Current Passport Size Photo</label>
                <input type="file" class="form-control" id="selfieUpload" name="selfie_path" required>
            </div>
            <button type="button" class="btn btn-secondary prev-step" data-prev="#documents">Previous</button>
            <button type="button" class="btn btn-primary next-step" data-next="#stamp-duty">Next</button>
        </div>

        <!-- Stamp Duty Agreement -->
        <div class="tab-content hidden" id="stamp-duty">
            <h3>Stamp Duty Agreement</h3>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="stampDutyAgreement" name="stamp_duty_agreement" required>
                <label class="form-check-label" for="stampDutyAgreement">
                    I agree to the 2% stamp duty fee.
                </label>
            </div>
            <button type="button" class="btn btn-secondary prev-step" data-prev="#selfie">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

<!-- Footer -->
<footer class="bg-light text-dark py-4">
    <div class="container">
        <div class="row">
            <!-- Copyright Section -->
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="mb-0">&copy; 2024 Your Finance Company. All rights reserved.</p>
            </div>

           

            <!-- Additional Links/Social Media -->
            <div class="col-md-6 text-md-end text-center">
                <a href="#privacy-policy" class="text-dark me-3">Privacy Policy</a>
                <a href="#terms" class="text-dark me-3">Terms of Service</a>
                <a href="#contact-us" class="text-dark">Contact Us</a>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        // Stepper navigation
        $('.next-step').on('click', function () {
            var nextTab = $(this).data('next');
            $('.tab-content').addClass('hidden');
            $(nextTab).removeClass('hidden');
            updateStepper(nextTab);
        });

        $('.prev-step').on('click', function () {
            var prevTab = $(this).data('prev');
            $('.tab-content').addClass('hidden');
            $(prevTab).removeClass('hidden');
            updateStepper(prevTab);
        });

        function updateStepper(currentTab) {
            var stepIndex = $('.tab-content').index($(currentTab));
            $('.step').each(function (index) {
                if (index < stepIndex) {
                    $(this).addClass('completed').removeClass('active');
                } else if (index === stepIndex) {
                    $(this).addClass('active').removeClass('completed');
                } else {
                    $(this).removeClass('active completed');
                }
            });
        }
    });
</script>

</body>
</html>
