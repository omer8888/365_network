<?php include("includes/header.php");
//session_destroy();

?>
    <div class="user_details_box column">
        <img src="<?php echo $user['profile_pic'];?>">

        <div class="user_details_box_text">
            <b><?php echo $user['first_name']." ".$user['last_name'] ;?></b>
            <br>
            <?php  echo "Total posts : ".$user['num_posts'].""; ?>
            <br>
            <?php  echo "Total Likes : ".$user['num_likes']."";  ?>
            <br>
            <?php  echo "Since : ".$user['signup_date']."";  ?>
        </div>
    </div>

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
