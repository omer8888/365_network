<?php
require_once("resources/config.php");
require_once("resources/errors_msgs.php");
require_once("includes/form_handlers/register_handler.php");
require_once("includes/form_handlers/login_handler.php");
?>

<html>
<head>
    <title>Register to 365 Network</title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="login_email_or_username" placeholder="Email/Username" required value="<?php if(isset($_SESSION['login_email_or_username'])) echo $_SESSION['login_email_or_username']; ?>">
    <br>
    <input type="password" name="login_pass" placeholder="Password">
    <br>
    <input type="submit" name="login_submit" value="Login">
    <?php if(isset($login_error)){echo "<br><span style='color: #ba0a0a'>$login_error</span>"; } ?>
</form>

<form action="" method="POST">
    <input type="text" name="reg_username" placeholder="User Name" value="<?php if(isset($_SESSION['reg_username'])) echo $_SESSION['reg_username']; ?>">
    <?php if(in_array( USERNAME_LENGTH, $error_array)) echo USERNAME_LENGTH;
            elseif (in_array( USERNAME_EXIST, $error_array)) echo USERNAME_EXIST; ?>
    <br>
    <input type="text" name="reg_fname" placeholder="First Name" required value="<?php if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname']; ?>">
    <?php if(in_array(FNAME_LENGTH, $error_array)) echo FNAME_LENGTH; ?>
    <br>
    <input type="text" name="reg_lname" placeholder="Last Name" required value="<?php if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname']; ?>">
    <?php if(in_array(LNAME_LENGTH, $error_array)) echo LNAME_LENGTH; ?>
    <br>
    <input type="email" name="reg_email" placeholder="Email" required value="<?php if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email']; ?>">
    <?php if(in_array(EMAIL_FORMAT, $error_array)) echo EMAIL_FORMAT;
          elseif(in_array(EMAIL_EXIST, $error_array)) echo EMAIL_EXIST; ?>
    <br>
    <input type="email" name="reg_email2" placeholder="Confirm Email" required value="<?php if(isset($_SESSION['reg_email2'])) echo $_SESSION['reg_email2']; ?>">
    <?php if(in_array(EMAIL_NOT_MATCH, $error_array)) echo EMAIL_NOT_MATCH; ?>
    <br>
    <input type="password" name="reg_pass" placeholder="Password" required value="<?php if (isset($_SESSION['reg_pass'])) echo $_SESSION['reg_pass']; ?>">
    <?php if(in_array(PASS_FORMAT, $error_array)) echo PASS_FORMAT;
            elseif (in_array(PASS_LENGTH, $error_array)) echo PASS_LENGTH; ?>
    <br>
    <input type="password" name="reg_pass2" placeholder="Confirm Password" required value="<?php if(isset($_SESSION['reg_pass2'])) echo $_SESSION['reg_pass2']; ?>">
    <?php if(in_array(PASS_NOT_MATCH, $error_array)) echo PASS_NOT_MATCH; ?>
    <br>
    <input type="submit" name="reg_submit" value="Register">
    <?php if(isset($reg_status)){echo "<br><span style='color: #14CB00'>Signup completed!</span>"; } ?>
</form>
</body>
</html>
