<?php
    if(isset($_POST['post_status'])) // if use clicked on post status
    {
        $post = new Post($user_obj->get_user_id(),$_POST['post_text']); // created new post instance with the current sender user
        $post->submitPost(); // updating the posts table with the post body
        redirect("index.php"); //refresh the page
    }
?>