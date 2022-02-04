<?php
    require_once("includes/header.php");
    global $user_obj; // to be able to use the logged in user object
    ?>

<!-- user info box -->
    <div class="user_details_box column">
        <a href="<?php echo $user['user_name'] ?>">
            <img src="<?php echo $user['profile_pic'];?>">
        </a>

        <div class="user_details_box_text">
            <b><a href="<?php echo $user['user_name'] ?>">
                <?php echo $user_obj->getFirstAndLastName(); ?>
            </a></b>
            <br>
            <?php  echo "Posts : ".$user['num_posts'].""; ?>
            <br>
            <?php  echo "Likes : ".$user['num_likes']."";  ?>
            <br>
            <?php  echo "Since : ".$user['signup_date']."";  ?>
        </div>
    </div>


<!-- main box -->
    <div class="main_box column">
            <form class="post_form" action=index.php" method="POST">
                <textarea name=post_text" id="post_text" placeholder="What do you want to say?"></textarea>
                <input type="submit" name="post" id="post_button" value="Post">
                <hr>
            </form>
    </div>

</div> <!-- /wrapper -->
</body>
</html>
