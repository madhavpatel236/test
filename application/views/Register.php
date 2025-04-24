
    <!-- 
<form method="post" id="register_form" action="<?php echo site_url('UserController/register'); ?>">
        <span for="register_name"> Name </span>
        <input type="text" class="register_name" id="register_name" name="register_name" />
        <span name="name_error" id="name_error"></span> <br /> <br />

        <span for="register_email"> Email </span>
        <input type="email" class="register_email" id="register_email" name="register_email" />
        <span name="email_error" id="email_error"></span> <br /> <br />

        <span for="register_password"> password</span>
        <input type="password" class="register_password" id="register_password" name="register_password" />
        <span name="password_error" id="password_error"></span> <br /> <br />

        <input type="hidden" id="user_role" name="user_role" value="user" />
        <button class="submit_login"> Submit </button>
        <a href="<?php print site_url('AuthController/view'); ?>"> Login</a>

    </form> -->

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root ">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex  flex-column flex-lg-row flex-column-fluid">

            <!--begin::Body-->
            <div class="d-flex  flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex  flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="register_form form w-100" name="register_form" novalidate="novalidate" id="register_form kt_sign_up_form" method="post" action="<?php echo site_url('UserController/register'); ?>">
                            <!--begin::Heading-->
                            <div class="mb-10 text-center">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Create an Account</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                    <a href="<?php print site_url('AuthController/view'); ?>" class="link-primary fw-bolder">Sign in here</a>
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <!--begin::Col-->
                                <div class="fv-row ">
                                    <label for="register_name" class="form-label fw-bolder text-dark fs-6">First Name</label>
                                    <!-- <input type="text" class="register_name" id="register_name" name="register_name" /> -->
                                    <input class="register_name form-control form-control-lg form-control-solid" type="text" placeholder="" name="register_name" id="register_name" />
                                    <span name="name_error" class="name_error" id="name_error"></span> <br /> <br />
                                    <!-- <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" /> -->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label for="register_email" class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="register_email form-control form-control-lg form-control-solid" type="email" placeholder="" name="register_email" id="register_email" />
                                <span name="email_error" class="email_error" id="email_error"></span> <br /> <br />

                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6" for="register_password">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <!-- <input type="password" class="register_password" id="register_password" name="register_password" /> -->

                                        <input class="register_password form-control form-control-lg form-control-solid" type="password" placeholder="" name="register_password" id="register_password" />

                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <span name="password_error" class="password_error" id="password_error"></span> <br /> <br />
                                    <!--end::Input wrapper-->

                                </div>
                                <!--end::Wrapper-->
                                <span name="credential_error" class="credential_error text-center text-danger" id="credential_error"> <?php $check = $this->session->userdata('credential_error');
                                                                                                                                        if (isset($check)) echo $check; ?> </span> <br /> <br />
                                <input type="hidden" id="user_role" name="user_role" value="user" />
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!-- <button class="submit_login"> Submit </button> -->
                                <div class="text-center">
                                    <!--begin::Submit button-->
                                    <button type="submit" name="submit_register" id="submit_register kt_sign_in_submit" class="submit_register btn btn-lg btn-primary w-100 mb-5">
                                        Submit
                                    </button>
                                    <!--end::Submit button-->
                                </div>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <!--begin::Links-->
                    <div class="d-flex flex-center fw-bold fs-6">
                        <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                        <a href="https://keenthemes.com/support" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
                        <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Main-->


<script>
    $(document).ready(function() {
        $('.register_form').on('submit', function(e) {
            var_dump("email");
            exit;
            var email = $('#register_email').val();
            var password = $('#register_password').val();
            var name = $('#register_name').val();
            var error = false;

            if (name.trim() == "") {
                $("#name_error").html("Please enter a name.");
                error = true;
            }
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