<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/auth.css">
</head>

<body style="background-color: #F0A500;">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="login-box mt-5" style="opacity: 0.95 !important;">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card">
                    <div class="pt-5 pb-3 px-4">
                        <div class=" card-body p-0">
                            <div class="text-center">
                                <h1 class="h4 font-weight-bolder mt-1" style="color: black !important;"> LOGIN SISTEM</h1>
                                <hr class="mb-4 garis">
                            </div>
                            <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>
                            <form method="POST" action="<?= base_url('auth/login') ?>">
                                <div class="mb-3">
                                    <div class="input-group <?= (form_error('username')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"> <span class="fas fa-fw fa-user"></span></span>
                                        </div>
                                        <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('username') ?>" name="username" autocomplete="off" autofocus>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('username') ?>
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <div class="input-group <?= (form_error('password')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"> <span class="fas fa-fw fa-lock"></span></span>
                                        </div>
                                        <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" autocomplete="off">

                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('password') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning btn-block mt-4 font-weight-bolder mb-5">Masuk</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
    <!-- SWEETALERT2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {

            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                Swal.fire({
                    title: 'Success',
                    text: flashData,
                    icon: 'success'
                });
            }
            const error = $('.error').data('error');
            if (error) {
                Swal.fire({
                    title: 'Error!',
                    text: error,
                    icon: 'error'
                });
            }
        });
    </script>
</body>

</html>