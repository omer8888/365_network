<?php
    require("includes/header.php");
    require("includes/classes/Post.php");

    global $user_obj; // to be able to use the logged in user object

        if(isset($_POST['post'])) // if use clicked on post status
        {
            $post = new Post($user_obj->get_user_id(),$_POST['post_text']); // created new post instance with the current sender user
            $post->submitPost(); // updating the posts table with the post body
            redirect("index.php"); //refresh the page
        }
?>

<!-- user info box -->
    <div class="user_details_box column">
        <a href="<?php echo $user['user_name']; ?>">
            <img src="<?php echo $user['profile_pic'];?>">
        </a>

        <div class="user_details_box_text">
            <b><a href="<?php echo $user['user_name'] ?>">
                <?php echo $user_obj->getFirstAndLastName(); ?>
            </a></b>
            <br>
            <?php  echo "Posts : ".$user_obj->get_user_posts_num(); ?>
            <br>
            <?php  echo "Likes : ".$user_obj->get_user_likes_num();  ?>
            <br>
            <?php  echo "Since : ".$user['signup_date']."";  ?>
        </div>
    </div>


<!-- main box -->
    <div class="main_box column">
            <form class="post_form" action="index.php" method="POST">
                <textarea name="post_text" id="post_text" placeholder="What do you want to say?"></textarea>
                <input type="submit" name="post" id="post_button" value="Post">
                <hr>
                <?php $user_obj->get_friends_posts(); ?>
            </form>


    </div>

</div> <!-- /wrapper -->
</body>
</html>
