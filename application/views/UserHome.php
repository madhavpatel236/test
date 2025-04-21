<?php

// $userEmail = $_SESSION['currentUserEmailID'];
// $userRole = $_SESSION['userRole'];
// // var_dump($userEmail);
// // var_dump($userRole);
// // exit;    
// if ($userEmail &&  $userRole == 'admin') {
//     site_url('AuthController/adminView');
// } elseif ($userEmail &&  $userRole == 'user') {
//     // var_dump('dsfv');exit;
//     site_url('AuthController/UserHome');
// } else {
//     redirect('AuthController/view');
// }

?>

    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserHome</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->

    <div class="flex">
        <h3 id="complete_message" style="display: none;"> Quiz was completed by you. </h3>

        <form id="quizeForm" class="quizeForm flex" method="post" action="<?php print site_url('UserController/insertUserData') ?>">
            <div class="post d-flex flex-column-fluid mw-lg-700px mt-20" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="card-px pt-10 pb-5">
                                <div class="modal-body scroll-y pt-0 pb-15">
                                    <!--begin::Wrapper-->
                                    <div class="mw-lg-500px mx-auto">
                                        <!--begin::Heading-->
                                        <div class="mb-10 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">Questions</h1>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <h5> Which is Your favorite IPL team?</h5>
                                            <div class="d-flex">
                                                <input id="question1 kt_share_earn_link_input" type="text" class="question1 form-control form-control-solid me-3 flex-grow-1" name="question1" />
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <div class="mb-10">
                                            <h5 class=""> Which is your favorite player?</h5>
                                            <div class="d-flex">
                                                <input id="question2 kt_share_earn_link_input" type="text" class="question2 form-control form-control-solid me-3 flex-grow-1" name="question2" />
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <h5 class="">Hom many IPL season was organized so far?</h5>
                                            <div class="d-flex">
                                                <input id="question3 kt_share_earn_link_input" type="text" class="question3 form-control form-control-solid me-3 flex-grow-1" name="question3" />
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <h5 class="">Which is the highest run scorer in IPL(all seasons)?</h5>
                                            <div class="d-flex">
                                                <input id="question4 kt_share_earn_link_input" type="text" class="question4 form-control form-control-solid me-3 flex-grow-1" name="question4" />
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <h5 class="">When india was won the last icc trophies?</h5>
                                            <div class="d-flex">
                                                <input id="question5 kt_share_earn_link_input" type="text" class="question5 form-control form-control-solid me-3 flex-grow-1" name="question5" />
                                            </div>
                                        </div>
                                        <div id="question_error"> </div>
                                        <!-- <button name="user_submit_btn" class="user_submit_btn"> Submit </button> -->
                                        <button name="user_submit_btn" id="user_submit_btn kt_modal_new_address_cancel" class="user_submit_btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">
                                            <span class=" align-center justify-center indicator-label">Submit</span>
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modal - Share & Earn-->

                    <!--end::Modal - Share & Earn-->
                </div>
                <!--end::Container-->
            </div>
        </form>

        <!-- Rank table -->
        <div class="card mt-10 justify-content-center  w-400px ">
            <div class="card-header  ">
                <h3 class="card-title"> <strong> Points Table</strong></h3>
            </div>
            <div class="card-body py-3 ">
                <div class="table-responsive ">
                    <table class="rankTable table table-row-dashed table-row-gray-300 align-middle gs-0  gy-6" name="rankTable" id="rankTable rules_table">
                        <thead id="table_head" class="table_head" name="table_head">
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-100px">Rank</th>
                                <th class="min-w-150px">Name</th>
                                <th class="min-w-140px">Points</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="tableBody" name="tableBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

<script>
    $(document).ready(function() {
        let isValidate;

        function onlyNnumbers() {
            var answer3 = $("#question3").val().trim();
            console.log(answer3 < 0);
            if (answer3 < 0) {
                $("#answer3_error").text("Only positive numbers are allowed.");
                // $("#question3").val("");
            }
        }

        function answerValidation() {
            var answer1 = $("#question1").val().trim();
            var answer2 = $("#question2").val().trim();
            var answer3 = $("#question3").val().trim();
            var answer4 = $("#question4").val().trim();
            var answer5 = $("#question5").val().trim();
            if (
                answer1 == "" ||
                answer2 == "" ||
                answer3 == "" ||
                answer4 == "" ||
                answer5 == ""
            ) {
                $("#question_error").text("*All the answers is require for this Quize.");
                return false;
            } else {
                $("#question_error").text("");
                return true;
            }
        }

        $("#question1").on("input", answerValidation);
        $("#question2").on("input", answerValidation);
        $("#question3").on("input", answerValidation);
        $("#question3").on("input", onlyNnumbers);
        $("#question4").on("input", answerValidation);
        $("#question5").on("input", answerValidation);

        $("#quizeForm").submit(function(e) {
            isValidate = answerValidation();
            if (!isValidate) {
                e.preventDefault();
            }
        });
    });
</script>


<script>
    showRankTable();
    TestStatus();
    $(document).ready(function() {
        $('.user_submit_btn').on('click', function() {
            showRankTable();
            TestStatus();
        })
    })

    function showRankTable() {
        $.ajax({
            url: "<?php print site_url("UserController/showUserRankTable") ?>",
            type: "GET",
            data: {},
            success: function(res) {
                var user = JSON.parse(res);
                // alert(user); exit;
                var value = '';
                let count = 0;

                if (user && user.length > 0) {
                    // alert(typeof(user));
                    user.forEach((userRank, index) => {
                        // alert(userRank.Name); alert;
                        count++;
                        value += `
                        <tr > 
                        <td>
                            <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bolder text-hover-primary fs-6">${userRank.Rank}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder fs-6">${userRank.Name}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder fs-6">${userRank.Points}</span>
                        </td>
                    </tr>
                        `
                    });

                    if ($.fn.DataTable.isDataTable('.rankTable')) {
                        $('.rankTable').DataTable().clear().destroy();
                    }
                    $(".tableBody").html(value);

                    $('.rankTable').DataTable({
                        responsive: true,
                        paging: true,
                        searching: true,
                        ordering: true
                    });
                } else {
                    $('.rankTable').hide();

                }

                // if (user.length > 0) {
                //     $('#rankTable').show();
                //     for (let i = 0; i < user.length; i++) {
                //         values += '<tr>';
                //         values += "<td>" + (user[i].Rank) + "</td> ";
                //         values += "<td>" + user[i].Name + "</td> ";
                //         values += "<td>" + user[i].Points + "</td> ";
                //         values += '</tr>';
                //         $('#tableBody').html(values);
                //     }
                // } else {
                //     $('#rankTable').hide();
                // }
            }
        })
    }

    function TestStatus() {
        $.ajax({
            url: "<?php print site_url('UserController/isUserCompleteTest') ?>",
            type: "GET",
            success: function(res) {
                // alert(res); 
                // if (res == 'false') {
                //     $('#quizeForm').hide();
                //     $('#complete_message').show();
                // } else {
                //     $("#quizeForm").show();
                //     $('#complete_message').hide();
                // }
            }
        })
    }
</script>

