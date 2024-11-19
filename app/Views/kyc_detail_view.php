<!-- app/Views/kyc_detail_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Application Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">KYC Application Details</h2>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <td><?= esc($kycForm['full_name']) ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?= esc($kycForm['dob']) ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?= esc($kycForm['gender']) ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?= esc($kycForm['address']) ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= esc($kycForm['phone']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= esc($kycForm['email']) ?></td>
            </tr>
            <tr>
                <th>Company Name</th>
                <td><?= esc($kycForm['company_name']) ?></td>
            </tr>
            <tr>
                <th>Registration Number</th>
                <td><?= esc($kycForm['registration_number']) ?></td>
            </tr>
            <tr>
                <th>Company Address</th>
                <td><?= esc($kycForm['company_address']) ?></td>
            </tr>
            <tr>
                <th>Company Phone</th>
                <td><?= esc($kycForm['company_phone']) ?></td>
            </tr>
            <tr>
                <th>Company Email</th>
                <td><?= esc($kycForm['company_email']) ?></td>
            </tr>
            <tr>
                <th>Nature of Business</th>
                <td><?= esc($kycForm['nature_of_business']) ?></td>
            </tr>
            <tr>
                <th>Document Path</th>
                <td>
                    <a href="<?= base_url('uploads/' . esc($kycForm['document_path'])) ?>" target="_blank">
                        <img src="<?= base_url('uploads/' . esc($kycForm['document_path'])) ?>" class="img-fluid" alt="Responsive Image" width="200" height="200">
                    </a>
					
					
                </td>
            </tr>
            <tr>
                <th>Additional Documents Path</th>
                <td>
                    <?php if ($kycForm['additional_documents_path']): ?>
                        <a href="<?= base_url('uploads/' . esc($kycForm['additional_documents_path'])) ?>" target="_blank">
                            <img src="<?= base_url('uploads/' . esc($kycForm['additional_documents_path'])) ?>" class="img-fluid" alt="Responsive Image" width="200" height="200"> 
                        </a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Address Proof Path</th>
                <td>
                    <a href="<?= base_url('uploads/' . esc($kycForm['address_proof_path'])) ?>" target="_blank">
                       <img src="<?= base_url('uploads/' . esc($kycForm['address_proof_path'])) ?>" class="img-fluid" alt="Responsive Image" width="200" height="200">  
                    </a>
                </td>
            </tr>
            <tr>
                <th>Selfie Path</th>
                <td>
                    <a href="<?= base_url('uploads/' . esc($kycForm['selfie_path'])) ?>" target="_blank">
                         <img src="<?= base_url('uploads/' . esc($kycForm['selfie_path'])) ?>" class="img-fluid" alt="Responsive Image" width="200" height="200"> 
                    </a>
                </td>
            </tr>
            <tr>
                <th>Application Time</th>
                <td><?= esc($kycForm['created_at']) ?></td>
            </tr>
        </tbody>
    </table>
	
	
    <a href="<?= base_url('kyc') ?>" class="btn btn-primary">Back to Applications</a>
	
	<a href="<?= base_url('kyc') ?>" class="btn btn-success"> Applications Approved</a>
	
	<a href="<?= base_url('kyc') ?>" class="btn btn-danger"> Applications Rejected</a>
	
	<a href="<?= base_url('kyc') ?>" class="btn btn-warning"> Applications Pending</a>
	
	
	<div class="mb-5"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
