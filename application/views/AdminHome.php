<?php

$userEmail = $_SESSION['currentUserEmailID'];
$userRole = $_SESSION['userRole'];
if ($userEmail &&  $userRole == 'admin') {

    site_url('AuthController/adminView');
} elseif ($userEmail &&  $userRole == 'user') {
    site_url('UserController/userHome');
} else {
    // var_dump($userRole);
    // exit;
    redirect('AuthController/view');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <?php $this->load->view('Navbar.php') ?>


    <div>
        <input name="user_number0" id="user_number0" type="number" min="0" />
        <input name="points0" id="points0" type="number" min="0" />
        <input id="edit_id" type="hidden" />
        <button id="plus_btn" name="plus_btn"> + </button>
    </div> <br>

    <!-- <div class="plus_data_div" id="plus_data_div" name="plus_data_div"></div> -->

    <!-- <button id="add_btn" class="add_btn" name="add_btn"> Add </button> -->
    <!-- <button style="display: none;" id="update_btn" class="update_btn" name="update_btn"> Update </button> -->
    <div class="card-px text-center pt-20 pb-5">
        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Add New Rules</a>
    </div>
    <div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_new_address_form">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_new_address_header">
                        <!--begin::Modal title-->
                        <h2>Add New Address</h2>
                        <!--end::Modal title-->
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
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Number of Players</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="user_number0" id="user_number0" type="number" min="0" class="form-control form-control-solid" placeholder="Enter Number of players" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Points</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input name="points0" id="points0" type="number" min="0" class="form-control form-control-solid" placeholder="Enter points" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->






                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address" class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>

    <!-- <div class="mb-10">
        <label for="exampleFormControlInput1" class="required form-label">Example</label>
        <input type="email" class="form-control form-control-solid" placeholder="Example input" />
    </div> -->


    <div class="card mt-10 mx-19">
        <div class="card-header  ">
            <h3 class="card-title"> <strong> Rules Table</strong></h3>
        </div>
        <div class="card-body py-3 ">
            <div class="table-responsive ">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0  gy-6" id="rules_table">
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-100px">#</th>
                            <th class="min-w-150px">No. of Players</th>
                            <th class="min-w-140px">Points</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="content_row">
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- <div style="display: none;">
        <div>
            <h3 class="card-title">Rules Table</h3>
        </div>
        <div class="card-body">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="rules_table">
                <thead>
                    <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th>No. of Players</th>
                        <th>Points</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="conctent_row">
                </tbody>
            </table>
        </div>
    </div> -->


</body>

<script>
    var count = 0;
    var numberOfUserArray = [];
    var pointsArray = [];

    $(document).ready(function() {

        showRulesTable(),


            $('#plus_btn').click(function() {
                count += 1;
                if (count >= 1) {
                    var field = `
            <div class='new_added_div${count}'  id='${count}'>
                <div>
                    <input class='user_number' id = 'user_number${count}' type="number" />
                    <input class='points' id='points${count}' type="number" />
                    <input class='field_id' id='${count}' hidden />
                    <button onclick='removeFieldData(${count})'  class="remove_btn" id = '${count}'> - </button>
            </div> <br/> </div>`;
                    $('.plus_data_div').append(field)
                };
            })

        $('.add_btn').click(function() {
            // e.preventDefault();
            for (let i = 0; i <= count; i++) {
                var numberOfUser = $(`#user_number${i}`).val();
                var points = $(`#points${i}`).val();
                numberOfUserArray[i] = numberOfUser;
                pointsArray[i] = points;
            }

            $.ajax({
                url: "<?php echo site_url('AdminController/addRules'); ?>",
                type: "POST",
                data: {
                    action: "add",
                    numberOfUser: numberOfUserArray,
                    points: pointsArray
                },
                success: function(response) {
                    // alert(response);
                    showRulesTable();
                },
            });
        })

        $("#update_btn").click(function() {

            var userNumbers = $('#user_number0').val();
            var points = $('#points0').val();
            var id = $('#edit_id').val();

            $.ajax({
                url: '<?php print site_url('AdminController/updateRule') ?>',
                type: "post",
                data: {
                    UserNumbers: userNumbers,
                    Points: points,
                    Id: id
                },
                success: function(res) {
                    // alert(res); exit;
                    $('#add_btn').show();
                    $('#update_btn').hide();
                    showRulesTable();
                }
            })
        })
    })

    // <tr class="rule-row-${rule.Id}">
    //     <td>${count}</td>
    //     <td>${rule.NumberOfPlayers}</td>
    //     <td>${rule.Points}</td>
    //     <td>
    //         <button  onclick="editRule(${rule.Id})"> </button>
    //         <button  onclick="deleteRule(${rule.Id})">         </button>
    //     </td>
    // </tr>


    function showRulesTable() {
        $.ajax({
            url: "<?php print site_url('AdminController/showRulesTable'); ?>",
            type: "GET",
            success: function(res) {
                const data = JSON.parse(res);
                let value = '';
                let count = 0;




                if (data && data.length > 0) {
                    $("#rules_table_card").show();


                    data.forEach((rule, index) => {
                        count++;
                        value += `
                    <tr> 
                        <td>
                            <span class="text-dark fw-bolder fs-6">${count}</span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bolder text-hover-primary fs-6">${rule.NumberOfPlayers}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder fs-6">${rule.Points}</span>
                        </td>
                        <td>
                            <div  class="d-flex gap-4 justify-content-end flex-shrink-0">
                                <span  onclick="editRule(${rule.Id})"> 
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                            <div onclick="deleteRule(${rule.Id})">         
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                        </svg>
                                    </span>
                            </div>
                            </div>
                        </td>
                        
                    </tr>
                    `;
                    });

                    if ($.fn.DataTable.isDataTable('#rules_table')) {
                        $('#rules_table').DataTable().clear().destroy();
                    }

                    // Append new content
                    $("#content_row").html(value);

                    $('#rules_table').DataTable({
                        responsive: true,
                        paging: true,
                        searching: true,
                        ordering: true
                    });

                } else {
                    $("#rules_table_card").hide();
                }
            }
        });
    }





    function deleteRule(id) {
        $.ajax({
            url: '<?php print site_url('AdminController/deleteRule') ?>',
            type: "POST",
            data: {
                Id: id
            },
            success: function(response) {
                // alert(response);
                showRulesTable();
                $(`.${id}`).remove();
            }
        })
    }

    function editRule(id) {
        $.ajax({
            url: '<?php print site_url('AdminController/editRule') ?>',
            type: 'POST',
            data: {
                Id: id
            },
            success: function(response) {
                var user = JSON.parse(response);
                // alert(user[0]);exit;
                $('#user_number0').val(user[0].NumberOfPlayers);
                $('#points0').val(user[0].Points);
                $('#edit_id').val(user[0].Id);
                $('#update_btn').show();
                $('.add_btn').hide();
                $('#plus_btn').hide();

            }
        })
    }
</script>

</html>