<?php
    require("includes/header.php");
    require("includes/classes/Post.php");
    require("includes/form_handlers/post_handler.php");
    global $user_obj; // to be able to use the logged in user object
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

    <!-- user info box -->
    <div class="groups_box column">
        <div class="groups_box_text">
            Hi <?php echo $user['user_name'] ?> <br>
            here there will be your groups <br>
            its still in progress
        </div>
    </div>


<!-- main box -->
    <div class="main_box column">
            <form class="post_form" action="index.php" method="POST">
                <textarea name="post_text" id="post_text" placeholder="What do you want to say?"></textarea>
                <input type="submit" name="post_status" id="post_button" value="Post">
                <hr>
                <div class="post_area"></div>
            </form>

        <img id='loading' src="resources/images/icons/loading.gif" width="60px">
    </div>

    <script> //scroll = more posts
        var user_logged_in_id = "<?php echo $user_obj->get_user_info()["id"]; ?>" ;
        $(document).ready(function(){
           $('#loading').show();
           $.ajax({
              url: "includes/handlers/ajax_load_posts.php",
              type: "POST",
              data: "page=1&user_logged_in_id=" + user_logged_in_id,
              cache: false,

              success: function(data){
                   $('#loading').hide();
                   $('.post_area').html(data);
              }
           });

           $(window).scroll(function (){
              //var height = $('.post_area').height();
              //var scroll_top = $(this).scrollTop();
              var page = $('.post_area').find('.nextPage').val() ;
              var no_more_posts = $('.post_area').find('.no_more_posts').val();
               if((document.body.scrollHeight == (document.body.scrollTop + window.innerHeight))&& no_more_posts == 'false'){
                  $('#loading').show();
                  var ajax_request=  $.ajax({
                                              url: "includes/handlers/ajax_load_posts.php",
                                              type: "POST",
                                              data: "page="+page+"&user_logged_in_id=" + user_logged_in_id,
                                              cache: false,

                                              success: function(response){
                                                  $('.post_area').find('.nextPage').remove(); //remove current nextpage class
                                                  $('.post_area').find('.no_more_posts').remove(); //remove current no_more_posts class
                                                  $('#loading').hide();
                                                  $('.post_area').append(response);
                                              }
                                            });
              } // end if

              return false
           });

        });
    </script>

</div> <!-- /wrapper -->
</body>
</html>
