<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSA Login with OTP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">DSA Login with OTP</h2>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <!-- Email Form -->
        <form action="<?= base_url('/dsa-login/send-otp') ?>" method="post">
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Send OTP</button>
          </div>
        </form>

        <hr>

        <!-- OTP Verification Form -->
        <form action="<?= base_url('/dsa-login/verify-otp') ?>" method="post">
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="text" name="otp" class="form-control" id="otp" required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-success">Verify OTP</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
