<?php
require_once("resources/config.php");
//    $reg_username = 'omer';
//    $reg_fname = 'omer';
//    $reg_lname = 'omer';
//    $reg_email = 'omer';
//    $reg_email2 = 'omer';
//    $reg_pass = 'omer';
//    $reg_pass2 = 'omer';
//    $reg_date = '2020-11-29';
//    $reg_profile_pic = 'omer';
//$query = query("INSERT INTO USERS (id,first_name,last_name,user_name,email,password,signup_date,profile_pic,num_posts,num_likes,private_acc,friend_array)
// VALUES ('', '{$reg_fname}', '{$reg_lname}', '{$reg_username}', '{$reg_email}', '{$reg_pass}', '{$reg_date}', '{$reg_profile_pic}', '0', '0', 'no', 'null')");
//confirm($query);

if(isset($_POST['reg_submit'])) {
    $reg_username = ucfirst(strtolower(strip_tags($_POST['reg_username'])));
    $reg_fname = ucfirst(strtolower(strip_tags($_POST['reg_fname']))); //remove html, lowercase for all input, keeping only first upper
    $reg_lname = ucfirst(strtolower(strip_tags($_POST['reg_lname'])));
    $reg_email = ucfirst(strtolower(strip_tags($_POST['reg_email'])));
    $reg_email2 = ucfirst(strtolower(strip_tags($_POST['reg_email2'])));
    $reg_pass = strip_tags($_POST['reg_pass']);
    $reg_pass2 = strip_tags($_POST['reg_pass2']);
    $date = date("Y-M-D");
    $reg_date = null;
    $reg_profile_pic = null;

    $error_array = "";
    //-----email verification and logic ----V
    if (!filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email format <br>";
    }
    if ($reg_email != $reg_email2) { //verify emails are the same
        echo "emails dont match <br>";
    }
    $query = query("SELECT * FROM USERS WHERE EMAIL='$reg_email'");
    confirm($query);
    if (mysqli_num_rows($query) > 0) {
        echo "this email already exist <br>";
    } //-----email verification and logic ----^
    else {
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
    <input type="text" name="reg_fname" placeholder="First Name" required>
    <br>
    <input type="text" name="reg_lname" placeholder="Last Name" required>
    <br>
    <input type="text" name="reg_username" placeholder="User Name" required>
    <br>
    <input type="email" name="reg_email" placeholder="Email" required>
    <br>
    <input type="email" name="reg_email2" placeholder="Confirm Email" required>
    <br>
    <input type="password" name="reg_pass" placeholder="Password" required>
    <br>
    <input type="password" name="reg_pass2" placeholder="Confirm Password" required>
    <br>
    <input type="submit" name="reg_submit" value="Register">
</form>
</body>
</html>
