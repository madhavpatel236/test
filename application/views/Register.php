<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form method="post" action="<?php echo site_url('UserController/register'); ?>">
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

</html>