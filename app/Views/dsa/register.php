<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSA Register Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">DSA Register Form</h2>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if (isset($validation)) : ?>
          <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('/dsa-register/submit') ?>" method="post">
          <?= csrf_field() ?>
          <!-- Full Name -->
          <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" id="full_name" value="<?= old('full_name') ?>" required>
          </div>

          <!-- Email Address -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= old('email') ?>" required>
          </div>

          <!-- Phone Number -->
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" name="phone" class="form-control" id="phone" value="<?= old('phone') ?>" required>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" value="<?= old('address') ?>" required>
          </div>

          <!-- City -->
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city" value="<?= old('city') ?>" required>
          </div>

          <!-- Zip Code -->
          <div class="mb-3">
            <label for="zip_code" class="form-label">Zip Code</label>
            <input type="text" name="zip_code" class="form-control" id="zip_code" value="<?= old('zip_code') ?>" required>
          </div>

          <!-- Submit Button -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
