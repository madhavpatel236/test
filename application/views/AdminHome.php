<?php

$userEmail = $_SESSION['currentUserEmailID'];
$userRole = $_SESSION['userRole'];
// var_dump($userRole);

if ($userEmail != null && $userRole != null  && $userRole = 'user') {
    // var_dump($userRole);
    site_url('UserController/userHome');
} elseif ($userEmail != null && $userRole != null  &&  $userRole = 'admin') {
    var_dump($userRole);
    site_url('AuthController/adminView');
} else {
    // var_dump($userRole);     
    site_url('AuthController/view');
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
</head>

<body>
    <form method="post" action="<?php print site_url('AuthController/view'); ?>">
        <button type="submit" class="logout_btn" name="logout_btn"> Logout </button>
    </form>
    <div>
        <span style="margin-right: 100px;">Users Number </span>
        <span>Points </span>
    </div>

    <div>
        <input name="user_number0" id="user_number0" type="number" min="0" />
        <input name="points0" id="points0" type="number" min="0" />
        <input id="edit_id" type="hidden" />
        <button id="plus_btn" name="plus_btn"> + </button>
    </div> <br>

    <div class="plus_data_div" id="plus_data_div" name="plus_data_div"></div>

    <button id="add_btn" class="add_btn" name="add_btn"> Add </button>
    <button style="display: none;" id="update_btn" class="update_btn" name="update_btn"> Update </button>

    <table style="display: none;" border="2" id="rules_table">
        <tr>
            <th> count </th>
            <th> No of Players </th>
            <th> Points </th>
            <!-- <th> </th> -->
        </tr>
        <tbody id="conctent_row"></tbody>
    </table>
</body>

<script>
    var count = 0;
    var numberOfUserArray = [];
    var pointsArray = [];

    $(document).ready(function() {
        showRulesTable();
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

    function showRulesTable() {
        $.ajax({
            url: "<?php print site_url('AdminController/showRulesTable');  ?>",
            type: "GET",
            data: {},
            success: function(res) {
                var data = JSON.parse(res);
                var value = '';
                var count = 0;
                // console.log(data);
                // exit;
                if (data != null) {
                    $("#rules_table").show();
                    for (let i = 0; i <= data.length - 1; i++) {
                        count++;
                        value += "<tr class='" + data[i]['Id'] + "'>";
                        value += "<td>" + count + "</td>";
                        value += "<td>" + data[i]['NumberOfPlayers'] + "</td>";
                        value += "<td>" + data[i]['Points'] + "</td>";
                        // value += "<td>";
                        value += "<td><button" + ' ' + 'class=' + 'edit_btn' + ' ' + 'onclick=' + 'editRule(' + data[i].Id + ')' + ' ' + data[i].Id + "> Edit </button> <button" + ' ' + 'class=' + 'delete_btn' + ' ' + 'onclick=' + 'deleteRule(' + data[i].Id + ')' + "> Delete </button> </td >";
                        // value += "</td>";
                        value += "</tr>";
                        $("#conctent_row").html(value);
                    }
                }
            }
        })
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