<!-- admin/magazines.php -->
<?= $this->extend('admin/layouts/user_layout') ?>

<?= $this->section('content') ?>


    <div class="container">
        <div class="mt-2">
            <h3>Administrator Panel</h3>
            <div class="row text-center g-4">
        <!-- Dashboard -->
        <div class="col-6 col-md-4">
            <a href="<?= base_url('/admin/dashboard'); ?>" class="text-decoration-none">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <i class="ti ti-layout-dashboard" style="font-size: 80px;"></i>
                    <h5 class="mt-3">Dashboard</h5>
                </div>
            </a>
        </div>
        
        <!-- Add Categories -->
        <div class="col-6 col-md-4">
            <a href="<?= base_url('admin/kyc') ?>" class="text-decoration-none">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <i class="ti ti-article" style="font-size: 80px;"></i>
                    <h5 class="mt-3">All Application</h5>
                </div>
            </a>
        </div>
        
        <!-- Upload Magazine 
        <div class="col-6 col-md-4">
            <a href="<?//= base_url('admin/uploadMagazine') ?>" class="text-decoration-none">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <i class="ti ti-alert-circle" style="font-size: 80px;"></i>
                    <h5 class="mt-3">User KYC</h5>
                </div>
            </a>
        </div>-->
        
        <!-- Manage Magazines -->
        <div class="col-6 col-md-4">
            <a href="<?= base_url('/admin/search_kyc') ?>" class="text-decoration-none">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <i class="ti ti-cards" style="font-size: 80px;"></i>
                    <h5 class="mt-3">Search KYC</h5>
                </div>
            </a>
        </div>
        
        <!-- Manage Users
        <div class="col-6 col-md-4">
            <a href="<?//= base_url('admin/manageUsers') ?>" class="text-decoration-none">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <i class="ti ti-file-description" style="font-size: 80px;"></i>
                    <h5 class="mt-3">Loan Status</h5>
                </div>
            </a>
        </div> -->
       
        
        <!-- Logout -->
        <div class="col-6 col-md-4">
            <a href="<?= base_url('admin/logout') ?>" class="text-decoration-none">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <i class="ti ti-login" style="font-size: 80px;"></i>
                    <h5 class="mt-3">Logout</h5>
                </div>
            </a>
        </div>
    </div>
		   
        </div>

       
    </div>
<?= $this->endSection() ?>