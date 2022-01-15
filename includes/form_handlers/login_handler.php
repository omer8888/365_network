<?php

if(isset($_POST['login_submit'])) {
    $_SESSION['login_email_or_username'] =$login_email_or_username = ucfirst(strtolower(strip_tags($_POST['login_email_or_username'])));
    $login_pass = md5($_POST['login_pass']);

    $query=query("SELECT * FROM USERS WHERE EMAIL='{$login_email_or_username}' OR USER_NAME='{$login_email_or_username}'");
    confirm($query);
    if(mysqli_num_rows($query)==0) {
        $login_error= USERNAME_OR_EMAIL_NOT_EXIST;}
    else{
        $user = mysqli_fetch_array($query);
        if($user['password']==$login_pass){
            $_SESSION['user_name'] =$user['user_name'];
            if($user['user_closed']=='yes'){ // setting user as connected
                echo "in";
                $query=query("UPDATE USERS SET USER_CLOSED = 'no' WHERE USER_NAME='{$user['user_name']}'");
            }

            redirect("index.php");
            clear_reg_sessions();
        }
        else{
            $login_error = WRONG_PASS;
        }
    }

}