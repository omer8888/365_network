<?php

if(isset($_POST['login_submit'])) {
    $_SESSION['login_email_or_username'] =$login_email_or_username = ucfirst(strtolower(strip_tags($_POST['login_email_or_username'])));
    $login_pass = md5($_POST['login_pass']);

    $query=query("SELECT * FROM USERS WHERE EMAIL='{$login_email_or_username}' OR USER_NAME='{$login_email_or_username}'");
    confirm($query);
    if(mysqli_num_rows($query)==0) {
        $login_error='username/email dosent exist';}
    else{
        $user = mysqli_fetch_array($query);
        if($user['password']==$login_pass){
            $_SESSION['username'] =$user['username'];
            redirect("index.php");
        }
        else{
            $login_error='wrong password';
        }
    }

}