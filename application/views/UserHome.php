<?php

$userEmail = $_SESSION['currentUserEmailID'];
$userRole = $_SESSION['userRole'];
if ($userEmail != null &&  $userRole = 'user') {
    site_url('UserController/userHome');
}
 elseif ($userEmail !=null &&  $userRole = 'admin') {
    site_url('AuthController/adminView');
} else {
    site_url('AuthController/view');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserHome</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</head>

<body>
    <div>
        <form method="post"  action="<?php print site_url('AuthController/view'); ?>">
            <button type="submit" class="logout_btn" name="logout_btn"> Logout </button>
        </form>
        <h3 id="complete_message" style="display: none;"> Quiz was completed by you. </h3>
        <form id="quizeForm" class="quizeForm" method="post" action="<?php print site_url('UserController/insertUserData') ?>">
            <h2> Questions </h2>
            <div id="question_error"> </div>
            <div>
                <h4> Question:1 -> Which is Your favorite IPL team? </h4>
                <input name="question1" id="question1" type="text" />
            </div>

            <div>
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
            </div> <br />

            <button name="user_submit_btn" class="user_submit_btn"> Submit </button>
        </form>

        <table style="display: none;" name="rankTable" id="rankTable" class="rankTable" border="2">
            <tr id="table_head">
                <th>Rank</th>
                <th>Name</th>
                <th>Points</th>
            </tr>
            <tbody class="tableBody" name="tableBody" id="tableBody">

            </tbody>
        </table>
    </div>
</body>

<script>
    showRankTable();
    TestStatus();

    function showRankTable() {
        $.ajax({
            url: "<?php print site_url("UserController/showUserRankTable") ?>",
            type: "GET",
            data: {},
            success: function(res) {
                var user = JSON.parse(res);
                // alert(user); exit;
                var values = '';

                if (user.length > 0) {
                    $('#rankTable').show();
                    for (let i = 0; i < user.length; i++) {
                        values += '<tr>';
                        values += "<td>" + (user[i].Rank) + "</td> ";
                        values += "<td>" + user[i].Name + "</td> ";
                        values += "<td>" + user[i].Points + "</td> ";
                        values += '</tr>';
                        $('#tableBody').html(values);
                    }
                } else {
                    $('#rankTable').hide();
                }
            }
        })
    }

    function TestStatus() {
        $.ajax({
            url: "<?php print site_url('UserController/isUserCompleteTest') ?>",
            type: "GET",
            success: function(res) {
                // alert(res);
                if (res) {
                    $("#quizeForm").hide();
                    $('#complete_message').show();
                } else {
                    $("#quizeForm").show();
                    $('#complete_message').hide();
                }
            }
        })
    }
</script>

</html>