<?php

$userEmail = $_SESSION['currentUserEmailID'];
$userRole = $_SESSION['userRole'];
if ($userEmail != null &&  $userRole = 'user') {
    site_url('UserController/userHome');
} elseif ($userEmail != null &&  $userRole = 'admin') {
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
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</head>

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