<?php
// var_dump($_SESSION['currentUserEmailID']);
// $userEmail = $_SESSION['currentUserEmailID'];
// $userRole = $_SESSION['userRole'];
// if ($userEmail != null &&  $userRole = 'user') {
//     site_url('UserController/userHome');
// } elseif ($userEmail != null &&  $userRole = 'admin') {
//     site_url('AuthController/adminView');
// } else {
//     site_url('AuthController/view');
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</head>

<body>
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

    </form>
</body>
<script>
    $(document).ready(function() {
        $('#register_form').on('submit', function(e) {
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