<?php include("includes/header.php");
//session_destroy();

?>
    <div class="user_details column">
        <img src="<?php echo $user['profile_pic'];?>">

        <div class="user_details_text">
            <b><?php echo $user['first_name']." ".$user['last_name'] ;?></b>
            <br>
            <?php  echo "Total posts : ".$user['num_posts'].""; ?>
            <br>
            <?php  echo "Total Likes : ".$user['num_likes']."";  ?>
            <br>
            <?php  echo "Since : ".$user['signup_date']."";  ?>
        </div>
    </div>

</div> <!-- /wrapper -->
</body>
</html>
