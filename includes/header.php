<?php
require_once("resources/config.php");

if(isset($_SESSION['user_name'])){ // verifying user logged in
    $query = query("SELECT * FROM USERS WHERE USER_NAME='{$_SESSION['user_name']}'"); //using the global user name to get access to all the user info
    confirm($query);
    $user = mysqli_fetch_array($query);
}
else{
    redirect("register.php");
}

?>
<html>
<head>
    <title>365 Network</title>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- js: for the login slide -->
    <script src="resources/js/bootstrap.js"></script> <!-- bootstrap resources : for the header buttons -->

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body>

    <div class="top_bar">
        <div class="logo">
            <a href="index.php">365 Network</a>
        </div>
        <div class="logo_slogan">Let's connect</div>
        <nav>
            <a href="">
                <?php echo $user['first_name'] ;?>
            </a>
            <a href="index.php">
                <i class="fa fa-home fa-lg"></i>
            </a>
            <a href="">
                <i class="fa fa-comment fa-lg"></i>
            </a>
            <a href="">
                <i class="fa fa-bell fa-lg"></i>
            </a>
            <a href="">
                <i class="fa fa-users fa-lg"></i>
            </a>
            <a href="">
                <i class="fa fa-cog fa-lg"></i>
            </a>
            <a href="">
                <i class="fa fa-power-off fa-lg"></i>
            </a>
        </nav>
    </div>
    <div class="wrapper">

