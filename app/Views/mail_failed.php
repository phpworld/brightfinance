<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Failed</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Mail Failed!</h4>
                    <p>We encountered an issue while sending your email. Please try again or contact support if the issue persists.</p>
                    <hr>
                    <p class="mb-0">Click the button below to retry or go back.</p>
                </div>
                <a href="javascript:history.back()" class="btn btn-primary mt-3">Go Back</a>
                <a href="/kyc/retry" class="btn btn-warning mt-3">Retry Sending</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
