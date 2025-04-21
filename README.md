write_theam
write_integrator

<!-- <h4> Question:1 -> Which is Your favorite IPL team? </h4>
                <input name="question1" id="question1" type="text" style="border: 1px solid black" /> -->
                <!-- <input type="email" class="form-control form-control-flush" style="border: 1px solid black; margin-left: 10px; "  /> -->
                <!-- <div>
                    <h4> Question:2 -> Which is your favorite player? </h4>
                    <input id="question2" name="question2" type="text" />
                </div>

                <div>
                    <h4> Question:3 -> Hom many IPL season was organized so far? </h4>
                    <input name="question3" id="question3" type="number" />
                    <span id="answer3_error"> </span>
                </div>

                <div>
                    <h4> Question:4 -> Which is the highest run scorer in IPL(all seasons)? </h4>
                    <input name="question4" id="question4" type="text" />
                </div>

                <div>
                    <h4> Question:5 -> When india was won the last icc trophies? </h4>
                    <input name="question5" id="question5" type="text" />
                </div> <br /> -->



 <form id="quizeForm" class="quizeForm" method="post" action="<?php print site_url('UserController/insertUserData') ?>">
            <!-- <h2> Questions </h2> -->
            <!-- <div id="question_error"> </div> -->
            <div>
                <!-- <h4> Question:1 -> Which is Your favorite IPL team? </h4>
                <input name="question1" id="question1" type="text" style="border: 1px solid black" /> -->
                <!-- <input type="email" class="form-control form-control-flush" style="border: 1px solid black; margin-left: 10px; "  /> -->
                <!-- <div>
                    <h4> Question:2 -> Which is your favorite player? </h4>
                    <input id="question2" name="question2" type="text" />
                </div>

                <div>
                    <h4> Question:3 -> Hom many IPL season was organized so far? </h4>
                    <input name="question3" id="question3" type="number" />
                    <span id="answer3_error"> </span>
                </div>

                <div>
                    <h4> Question:4 -> Which is the highest run scorer in IPL(all seasons)? </h4>
                    <input name="question4" id="question4" type="text" />
                </div>

                <div>
                    <h4> Question:5 -> When india was won the last icc trophies? </h4>
                    <input name="question5" id="question5" type="text" />
                </div> <br /> -->

                <!-- <button name="user_submit_btn" class="user_submit_btn"> Submit </button> -->
        </form>





<div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pb-0">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-20 pb-5">

                            <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_share_earn">Share &amp; Earn</a>
                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modal - Share & Earn-->
                <div class="modal fade" id="kt_modal_share_earn" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-800px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y pt-0 pb-15">
                                <!--begin::Wrapper-->
                                <div class="mw-lg-600px mx-auto">
                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Share &amp; Earn</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                                            <a href="#" class="link-primary fw-bolder">Author Commision</a>.
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Title-->
                                        <h4 class="fs-5 fw-bold text-gray-800">Share my referral link with friends</h4>
                                        <!--end::Title-->
                                        <!--begin::Title-->
                                        <div class="d-flex">
                                            <input id="kt_share_earn_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="https://keenthemes.com/?ref=skitechnology" />
                                            <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bolder flex-shrink-0" data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-light w-100">
                                            <img alt="Logo" src="assets/media/svg/social-logos/google.svg" class="h-15px me-3" />Import Contacts</a>
                                        <a href="#" class="btn btn-light w-100 mx-6">
                                            <img alt="Logo" src="assets/media/svg/social-logos/facebook.svg" class="h-20px me-3" />Facebook</a>
                                        <a href="#" class="btn btn-light w-100">
                                            <img alt="Logo" src="assets/media/svg/social-logos/twitter.svg" class="h-20px me-3" />Twitter</a>
                                    </div>
                                    <!--end::Actions-->
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center mt-10">
                                        <!--begin::Label-->
                                        <div class="flex-grow-1">
                                            <span class="fs-6 fw-bold text-gray-800 d-block">Adding Users by Team Members</span>
                                            <span class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</span>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                            <span class="form-check-label">Allowed</span>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Share & Earn-->
            </div>
            <!--end::Container-->
        </div>














<div class="modal fade" id="kt_modal_share_earn" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-800px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y pt-0 pb-15">
                                <!--begin::Wrapper-->
                                <div class="mw-lg-600px mx-auto">
                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Share &amp; Earn</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                                            <a href="#" class="link-primary fw-bolder">Author Commision</a>.
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Title-->
                                        <h4 class="fs-5 fw-bold text-gray-800">Share my referral link with friends</h4>
                                        <!--end::Title-->
                                        <!--begin::Title-->
                                        <div class="d-flex">
                                            <input id="kt_share_earn_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="https://keenthemes.com/?ref=skitechnology" />
                                            <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bolder flex-shrink-0" data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-light w-100">
                                            <img alt="Logo" src="assets/media/svg/social-logos/google.svg" class="h-15px me-3" />Import Contacts</a>
                                        <a href="#" class="btn btn-light w-100 mx-6">
                                            <img alt="Logo" src="assets/media/svg/social-logos/facebook.svg" class="h-20px me-3" />Facebook</a>
                                        <a href="#" class="btn btn-light w-100">
                                            <img alt="Logo" src="assets/media/svg/social-logos/twitter.svg" class="h-20px me-3" />Twitter</a>
                                    </div>
                                    <!--end::Actions-->
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center mt-10">
                                        <!--begin::Label-->
                                        <div class="flex-grow-1">
                                            <span class="fs-6 fw-bold text-gray-800 d-block">Adding Users by Team Members</span>
                                            <span class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</span>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                            <span class="form-check-label">Allowed</span>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>