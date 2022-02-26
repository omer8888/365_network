<html>
<head>
    <title> </title>
    <!-- Css -->
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

    <?php
        require_once("resources/config.php");
        require_once("includes/classes/User.php");
        require_once("includes/classes/Post.php");

        if(isset($_SESSION['logged_in_user_id'])){ // verifying user logged in
            $user_obj = new User($_SESSION['logged_in_user_id']); // crete new user object
            //$user = $user_obj->get_user_info(); // set user info array
        }
        else{ // if user not logged in: redirect to register
            redirect("register.php");
        }

        //using the post id (post request) create new post obj
        if(isset($_GET['post_id'])) {
            $post_id=$_GET['post_id'];
            $post_obj = new Post($post_id);
            //$post_info = $post_obj->get_post_info();
        }

        //adding the comment to the post obj
        if(isset($_POST['postComment'.$post_id])){
            $post_obj->add_comment($_POST['post_body']);
            echo "<p> Comment Posted </p>";
        }
    ?>

    <!-- clicking on the post will show the hidden comment section -->
    <script>
        function toggle(){
            var element = document.getElementById("comment_section");
            if (element.style.display == "block")
                element.style.display = "none";
            else
                element.style.display = "block";
        }
    </script>

    <!-- clicking on comment will send 2 params: postComment{post_id} and post_id={post_id}-->
        <form method="post" action="comment_frame.php?post_id=<?php echo $post_id?>" id="comment_form" name="postComment<?php echo $post_id?>">
            <textarea name="post_body"></textarea>
            <input type="submit" name="postComment<?php echo $post_id ?>" value="Comment">
        </form>

<!--load comments-->




</body>
</html>