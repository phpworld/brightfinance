<!-- app/Views/kyc_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Online Applications</h2>

    <!-- Search Form -->
    <form method="post" action="<?= base_url('search_kyc') ?>" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="email" class="form-control" placeholder="Search by Email" value="">
            </div>
            <div class="col-md-4">
                <input type="text" name="phone" class="form-control" placeholder="Search by Phone" value="">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <?php if (!empty($kycForms)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($kycForms as $kyc): ?>
                    <tr>
                        <td><?= esc($i++) ?></td>
                        <td><?= esc($kyc['full_name']) ?></td>
                        <td><?= esc($kyc['phone']) ?></td>
                        <td><?= esc($kyc['dob']) ?></td>
                        <td><?= esc($kyc['email']) ?></td>
                        <td>
                            <a href="<?= base_url('kyc/view/' . $kyc['id']) ?>" class="btn btn-info">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Simple Pagination -->
        <div class="mt-3">
            <?= $pager->links('default') ?>
        </div>
        
    <?php else: ?>
        <div class="alert alert-warning" role="alert">
            No KYC applications found.
        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
