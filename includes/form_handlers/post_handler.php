<?php
    if(isset($_POST['post_status'])) // if use clicked on post status
    {
        // submit post using logged in user (sender user) and text from the post text box (form)
        post::submitPost($_SESSION['logged_in_user_id'],$_POST['post_text']); // updating the posts table with the post body
        redirect("index.php"); //refresh the page
    }
?>