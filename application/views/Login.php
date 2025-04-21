<?php

// $userEmail = $_SESSION['currentUserEmailID'];
// $userRole = $_SESSION['userRole'];
// // var_dump($userEmail);
// // var_dump($userRole);
// // exit;    
// if ($userEmail &&  $userRole == 'admin') {
//     site_url('AuthController/adminView');
// } elseif ($userEmail &&  $userRole == 'user') {
//     site_url('UserController/userHome');
// } else {
//     site_url('AuthController/view');
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root bg-dark">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sigma-1/14.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form method="post" action="<?php echo site_url('AuthController/auth'); ?>" class=" login_form form w-100" novalidate="novalidate" id=" login_form kt_sign_in_form">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to Game</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="<?php print site_url('UserController/view'); ?>" class="link-primary fw-bolder">Create an Account</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark" for="login_email">Email</label>
                            <!-- <input type="email" class="login_email" id="login_email" name="login_email" /> -->
                            <input class="login_email form-control form-control-lg form-control-solid" type="email" name="login_email" id="login_email" />
                            <span name="email_error" id="email_error"></span> <br /> <br />

                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <label for="login_password" class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            </div>
                            <!-- <input type="password" class="login_password" id="login_password" name="login_password" /> -->
                            <input class="login_password form-control form-control-lg form-control-solid" type="password" name="login_password" id="login_password" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <!-- <button class="submit_login"> Submit </button> -->
                            <button type="submit" id="submit_login kt_sign_in_submit" class="submit_login btn btn-lg btn-primary w-100 mb-5">
                                Submit
                            </button>
                            <!--end::Submit button-->

                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                    <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->
</body>
<script>
    $(document).ready(function() {
        $('#login_form').on('submit', function(e) {
            var email = $('#login_email').val();
            var password = $('#login_password').val();
            var error = false;
            if (email.trim() == "") {
                $("#email_error").html("Please enter a email.");
                error = true;
            }
            if (password.trim() == "") {
                $("#password_error").html("Please enter a passoword.");
                error = true;
            }
            if (error == true) {
                e.preventDefault();
            }
        })
    })
</script>

</html>