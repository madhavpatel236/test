
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="<?php echo site_url('AuthController/auth'); ?>">
        <span for="login_email"> Email </span>
        <input type="email"  class="login_email" id="login_email" name="login_email" />
        <span name="email_error" id="email_error"></span> <br /> <br />

        <span for="password_email"> password</span>
        <input type="password" class="login_password" id="login_password" name="login_password" />
        <span name="password_error" id="password_error"></span> <br /> <br />

        <button class="submit_login"> Submit </button>
        <a href="<?php print site_url('UserController/view'); ?>" > Register</a>
    </form>
</body>

</html>