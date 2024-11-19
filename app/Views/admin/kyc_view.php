<!-- admin/magazines.php -->
<?= $this->extend('admin/layouts/user_layout') ?>

<?= $this->section('content') ?>
<style>
ul.pagination li {
    padding: 5px 13px;
    background: #2499bf;
    border-radius: 17px;
}
ul.pagination li a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}
</style>
    <div class="container mt-5">
        <h1>KYC Forms</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
				<th>Sr. No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;foreach ($kycForms as $kyc): ?>
                <tr>
				<td><?= $i++; ?></td>
                    <td><?= esc($kyc['full_name']) ?></td>
                    <td><?= esc($kyc['phone']) ?></td>
                    <td><?= esc($kyc['dob']) ?></td>
                    <td><?= esc($kyc['email']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/kyc/view/' . $kyc['id']) ?>" class="btn btn-primary">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            <?= $pager->links('default') ?>
        </div>
		
		
		<a href="<?= base_url('admin/dashboard') ?>" class="btn btn-primary">Back to DASHBOARD</a>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>
