<?php
require_once("resources/config.php");

session_start();
error_reporting(E_ERROR | E_PARSE); //Only report fatal errors and parse errors.


if(isset($_POST['reg_submit'])) {
    $_SESSION['reg_username'] = $reg_username = ucfirst(strtolower(strip_tags($_POST['reg_username'])));
    $_SESSION['reg_fname'] = $reg_fname = ucfirst(strtolower(strip_tags($_POST['reg_fname']))); //remove html, lowercase for all input, keeping only first upper
    $_SESSION['reg_lname'] = $reg_lname = ucfirst(strtolower(strip_tags($_POST['reg_lname'])));
    $_SESSION['reg_email'] = $reg_email = ucfirst(strtolower(strip_tags($_POST['reg_email'])));
    $_SESSION['reg_email2'] = $reg_email2 = ucfirst(strtolower(strip_tags($_POST['reg_email2'])));
    $_SESSION['reg_pass'] = $reg_pass = strip_tags($_POST['reg_pass']);
    $_SESSION['reg_pass2'] = $reg_pass2 = strip_tags($_POST['reg_pass2']);
    $_SESSION['date'] = $date = date("Y-M-D");
    $_SESSION['reg_date'] = $reg_date = null;
    $_SESSION['reg_profile_pic'] = $reg_profile_pic = null;

    $error_array = array();

    //Length Validation
    array_push($error_array, StringLengthLimit('Username',$reg_username, 4,25));
    array_push($error_array, StringLengthLimit('First name',$reg_fname, 4,25));
    array_push($error_array, StringLengthLimit('Last name',$reg_lname, 4,25));
    array_push($error_array, StringLengthLimit('Password', $reg_pass, 4,25));
    array_push($error_array, StringLengthLimit('Date', $date, 6,10));

    array_push($error_array,Password_Verification($reg_pass,$reg_pass2));
    array_push($error_array, Email_Verification($reg_email,$reg_email2));


    if(count($error_array)==0){
        $query = query("INSERT INTO USERS (id,first_name,last_name,user_name,email,password,signup_date,profile_pic,num_posts,num_likes,private_acc,friend_array)
         VALUES ('', '{$reg_fname}', '{$reg_lname}', '{$reg_username}', '{$reg_email}', '{$reg_pass}', '{$reg_date}', '{$reg_profile_pic}', '0', '0', 'no', 'null')");
        confirm($query);
    }
}
?>

<html>
<head>
    <title>Register to 365 Network</title>
</head>
<body>
<form action="" method="POST">
    UserName: <input type="text" name="reg_username" placeholder="User Name" value=" <?php if(isset($_SESSION['reg_username'])) echo $_SESSION['reg_username']; ?>">
    <?php if(in_array("Username length is not valid", $error_array)) echo "Username length is not valid"; ?>
    <br>
    First Name: <input type="text" name="reg_fname" placeholder="First Name" required value="<?php if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname']; ?>">
    <?php if(in_array("First name length is not valid", $error_array)) echo "First name length is not valid"; ?>
    <br>
    Last Name: <input type="text" name="reg_lname" placeholder="Last Name" required value="<?php if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname']; ?>">
    <?php if(in_array("Last name length is not valid", $error_array)) echo "Last name length is not valid"; ?>
    <br>
    Email: <input type="email" name="reg_email" placeholder="Email" required value="<?php if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email']; ?>">
    <?php if(in_array("Invalid Email format", $error_array)) echo "Invalid Email format";
          if(in_array("this email already exist", $error_array)) echo "Emails dont match"; ?>
    <br>
    Confirm Email: <input type="email" name="reg_email2" placeholder="Confirm Email" required value="<?php if(isset($_SESSION['reg_email2'])) echo $_SESSION['reg_email2']; ?>">
    <?php if(in_array("Emails dont match", $error_array)) echo "Emails dont match"; ?>
    <br>
    Password: <input type="password" name="reg_pass" placeholder="Password" required value="<?php if (isset($_SESSION['reg_pass'])) echo $_SESSION['reg_pass']; ?>">
    <?php if(in_array("Password should contain only numbers and letters", $error_array)) echo "Password should contain only numbers and letters"; ?>
    <br>
    Confirm Password: <input type="password" name="reg_pass2" placeholder="Confirm Password" required value="<?php if(isset($_SESSION['reg_pass2'])) echo $_SESSION['reg_pass2']; ?>">
    <?php if(in_array("Passwords dont match", $error_array)) echo "Passwords dont match"; ?>
    <br>
    <input type="submit" name="reg_submit" value="Register">
</form>
</body>
</html>
