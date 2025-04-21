<body>
    <form id="login_form" method="post" action="<?php echo site_url('AuthController/auth'); ?>">
        <span for="login_email"> Email </span>
        <input type="email" class="login_email" id="login_email" name="login_email" />
        <span name="email_error" id="email_error"></span> <br /> <br />

        <span for="password_email"> password</span>
        <input type="password" class="login_password" id="login_password" name="login_password" />
        <span name="password_error" id="password_error"></span> <br /> <br />

        <button class="submit_login"> Submit </button>
        <a href="<?php print site_url('UserController/view'); ?>"> Register</a>
    </form>
</body>

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sigma-1/14.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id=" login_form kt_sign_in_form" class="login_form" method="post" action="<?php echo site_url('AuthController/auth'); ?>">
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
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <!--end::Label-->
                            <!-- begin::Input -->
                            <!-- <input type="email" class="login_email" id="login_email" name="login_email" /> -->
                            <input class="login_email form-control form-control-lg form-control-solid" type="email" name="login_email" id="login_email" />
                            <span name="email_error" id="email_error"></span> <br /> <br />

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <!-- <input type="password" class="login_password" id="login_password" name="login_password" /> -->
                            <input class="login_password form-control form-control-lg form-control-solid" id="login_password" type="password" name="login_password" />
                            <span name="password_error" id="password_error"></span> <br /> <br />

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <!-- <button class="submit_login"> Submit </button> -->
                            <button type="submit" id="submit_login kt_sign_in_submit" name="submit_login" class="submit_login btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
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