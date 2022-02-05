<?php

    Class User{
        private $user_info;
        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
            $query = query("SELECT * FROM users WHERE ID='$user_id'");
            $this->user_info =  mysqli_fetch_array($query);
        }

        public function getFirstAndLastName(){
            return $this->user_info["first_name"] ." ".$this->user_info["last_name"];
        }

        public function get_user_info(){
            return $this->user_info;
        }

        public function get_user_id(){
            return $this->user_id;
        }

        public function get_user_posts_num(){
            $query = query("SELECT NUM_POSTS FROM USERS WHERE ID='{$this->get_user_id()}'");
            $row = mysqli_fetch_array($query);
            return $row[0];
        }

        public function get_user_likes_num(){
            $query = query("SELECT NUM_LIKES FROM USERS WHERE ID='{$this->get_user_id()}'");
            $row = mysqli_fetch_array($query);
            return $row[0];
        }


        public function update_user_posts_count(){
            $new_post_num = $this->get_user_posts_num() + 1 ;
            $user_id = $this->get_user_id();
            $query = query("UPDATE USERS SET NUM_POSTS = '$new_post_num' WHERE ID='$user_id'");
            confirm($query);
        }

        public function get_friends_posts()
        {
            $str = "";

            $query = query("SELECT * FROM POSTS WHERE DELETED = 'no' ORDER BY POST_ID DESC"); //TODO: now its all posts but should support only friend posts
            confirm($query);
            while ($row = mysqli_fetch_array($query)) {
                $post_sender_obj = new user($row['sender_user_id']);
                //$id = $row['post_id'];
                $body = $row['body'];
                $date_post = $row['date_post'];
                //$likes = $row['likes'];
                $post_receiver_link='';

                if ($row['receiver_user_id'] != '0') { // if there is a receiver
                    $receiver_obj = new User($row['receiver_user_id']);
                    $receiver_full_name = $receiver_obj->getFirstAndLastName();
                    $post_receiver_link = "<a href={$row['first_name']}>$receiver_full_name</a>";
                }

                $current_date = new DateTime(date("Y-m-d H:i:s"));
                $date_post = new DateTime($date_post);
                $time_diff = $date_post->diff($current_date);

                if ($time_diff->y >= 1) {
                    if ($time_diff == 1) {
                        $time_msg = $time_diff->y . "year ago";
                    } else {
                        $time_msg = $time_diff->y . "years ago";
                    }
                } else if ($time_diff->m >= 1) {
                    if ($time_diff == 1) {
                        $time_msg = $time_diff->m . "month ago";
                    } else {
                        $time_msg = $time_diff->m . "months ago";
                    }
                }
                else if ($time_diff->d >= 1) {
                    if ($time_diff == 1) {
                        $time_msg = $time_diff->d . "day ago";
                    } else {
                        $time_msg = $time_diff->d . "days ago";
                    }
                }
                else if ($time_diff->h >= 1) {
                    if ($time_diff == 1) {
                        $time_msg = $time_diff->h . "hour ago";
                    } else {
                        $time_msg = $time_diff->h . "hours ago";
                    }
                }
                else if ($time_diff->i >= 1) {
                    if ($time_diff == 1) {
                        $time_msg = $time_diff->i . "minute ago";
                    } else {
                        $time_msg = $time_diff->i . "minutes ago";
                    }
                }
                else if ($time_diff->s < 30) {
                    $time_msg = "just now";
                } else {
                    $time_msg = $time_diff->s . "seconds ago";
                }

               $post_html = " <div class='status_post'>
                                    <div class='post_profile_pic'>
                                        <img src='{$post_sender_obj->user_info['profile_pic']}' width='45'>
                                    </div> 
                                    
                                    <div class='posted_by' style='color:#ACACAC;'>
                                        <a href='{$post_sender_obj->user_info['user_name']}'> {$post_sender_obj->getFirstAndLastName()} </a> $post_receiver_link &nbsp;&nbsp;&nbsp;&nbsp; $time_msg
                                    </div>   
                                    
                                    <div id='post_body'>
                                        $body
                                        <br>
                                    </div>     
                              </div>    
                              <hr>                        
                            ";
                echo $post_html;
            }


        }



    }
?>



