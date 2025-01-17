<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bright Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
             font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }


 .hero {
    height: 600px;
    background-image: url('<?=base_url('assets');?>/images/hero.jpg'); /* Replace with your image URL */
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    position: relative; /* Important for positioning the overlay */
    overflow: hidden; /* Ensure content doesn't overflow the hero section */
}

.hero::before {
    content: '';
    position: absolute; /* Positioning the overlay */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(128, 0, 128, 0.22); /* Purple transparent overlay */
    z-index: 0; /* Keep it behind the content */
}

.hero-content {
    position: relative; /* Position content above the overlay */
    z-index: 1; /* Ensure content is above the overlay */
}

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            transition: transform .2s;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .cta-button {
            background-color: #007bff;
            color: white;
            transition: background-color .3s;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }

        /* Custom Styles */
        .fadeIn {
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .info-box {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .info-box i {
            color: #007bff;
        }

        .service-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="<?=base_url('assets');?>/images/logo.png" alt="Bright Finance Logo" width="150" height="auto">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content fadeIn">
            <h1>Welcome to Bright Finance</h1>
            <p>Your trusted partner for personal and business loans.</p>
            <a href="#contact" class="btn cta-button btn-lg">Get Started</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">About Us</h2>
            <p class="lead">Bright Finance is committed to providing a range of loan services tailored to your unique
                needs. Whether you are looking for a personal loan, a business loan, or funding for your new startup,
                we are here to assist you with personalized service and competitive rates.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/personal_loan.jpg" class="card-img-top service-img" alt="Personal Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">Personal Loan</h5>
                            <p class="card-text">Get the funds you need for personal expenses with flexible terms.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/business_loan.jpg" class="card-img-top service-img" alt="Business Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">Business Loan</h5>
                            <p class="card-text">Support your business growth with our tailored financing solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/Mortgage Loan.jpg" class="card-img-top service-img" alt="Mortgage Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">Mortgage Loan</h5>
                            <p class="card-text">Achieve your dream home with our competitive mortgage options.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/Agriculture Loan.jpg" class="card-img-top service-img" alt="Agriculture Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">Agriculture Loan</h5>
                            <p class="card-text">Get support for your farming business with our agriculture loans.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/New Startup Business.jpg" class="card-img-top service-img" alt="Startup Business Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Startup Business</h5>
                            <p class="card-text">Start your dream business with our startup financing solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/New Startup Project.jpg" class="card-img-top service-img" alt="Startup Project Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Startup Project</h5>
                            <p class="card-text">We help fund new innovative projects and bring them to life.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?=base_url('assets');?>/images/New Startup Company.jpg" class="card-img-top service-img" alt="Startup Company Loan">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Startup Company</h5>
                            <p class="card-text">Get your new company off the ground with our funding solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Box Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="info-box text-center p-4">
                        <i class="fas fa-clock fa-3x mb-3"></i>
                        <h4>Quick Approval</h4>
                        <p>Fast and easy loan approval process for all types of loans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="info-box text-center p-4">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h4>Personalized Service</h4>
                        <p>Dedicated support to help you with your loan needs.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="info-box text-center p-4">
                        <i class="fas fa-dollar-sign fa-3x mb-3"></i>
                        <h4>Competitive Rates</h4>
                        <p>Attractive interest rates that fit your budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section id="contact" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Contact Us</h2>
        
        <!-- Flash Message -->
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?> alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="contact-form">
            <form action="<?= site_url('/contact/submit') ?>" method="post">
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <!-- Phone Number and Email Address in the Same Row -->
                <div class="row">
                    <!-- Phone Number -->
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <!-- Email Address -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <!-- Loan Type (Dropdown) -->
                <div class="mb-3">
                    <label for="loan-type" class="form-label">Loan Type</label>
                    <select class="form-select" id="loan-type" name="loan_type" required>
                        <option selected disabled>Select Loan Type</option>
                        <option value="personal">Personal Loan</option>
                        <option value="business">Business Loan</option>
                        <option value="mortgage">Mortgage Loan</option>
                        <option value="agriculture">Agriculture Loan</option>
                        <option value="startup">Startup Loan</option>
                    </select>
                </div>

                <!-- Loan Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Loan Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                
                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your message here..." required></textarea>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn cta-button btn-lg">Submit</button>
            </form>
        </div>
    </div>
</section>



<!-- CTA Section -->
<section class="cta-section py-5 text-white" style="background-color: #6c10b5;">
    <div class="container text-center">
        <h2 class="mb-4">Need Financial Assistance? Apply for a Loan Today!</h2>
        <p class="lead mb-4">Bright Finance is here to support you. Whether it's a personal loan, a business loan, or a loan for your startup, we're committed to offering you the best rates and quick approvals. Apply now and get started on your financial journey!</p>
        <a href="<?=base_url('/loan-apply');?>" class="btn btn-lg btn-light" target="_blank">Apply for a Loan</a>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">© 2024 Bright Finance. All rights reserved.</p>
            <div>
                <a href="#" class="text-white me-3">Privacy Policy</a>
                <a href="#" class="text-white">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
