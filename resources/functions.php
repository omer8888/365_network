<?php

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("query failed with error:  ". mysqli_error($connection));
    }
}

function Email_Verification($email1,$email2){
    if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
        return "Invalid Email format";
    }
    if ($email1 != $email2) { //verify emails are the same
        return "Emails dont match";
    }
    $query = query("SELECT * FROM USERS WHERE EMAIL='$email1'");
    confirm($query);
    if (mysqli_num_rows($query) > 0) {
        return "this email already exist";
    }
}

function Password_Verification($password1, $password2){
    if($password1 != $password2){
        return "Passwords dont match";
    }
    if(preg_match('/[^A-Za-z0-9]/', $password1)){
        return "Password should contain only numbers and letters";
    }
}

function StringLengthLimit($input_name, $str, $min_len, $max_len){
    if(strlen($str)>$max_len || strlen($str)< $min_len){
        return "$input_name length is not valid";
    }
}

function print_array($arr){
    foreach($arr as $value){ //printing the errors
        echo $value;
    }
}
