<?php
    include ("../../resources/config.php");
    include ("../classes/Post.php");
    include ("../classes/User.php");

    $limit=9;

    // the request has page and user_logged_in_id
    $logged_in_user_obj = new User($_REQUEST['user_logged_in_id']); // creating user obj from the logged in id
    $logged_in_user_obj->get_friends_posts($_REQUEST, $limit);

?>

