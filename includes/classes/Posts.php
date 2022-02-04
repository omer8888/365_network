<?php

    Class Post{
        private $user_obj;

        public function __construct($user_id){
            $this->user_obj = new User($user_id);
        }

        public function submitPost($body, $receiver_user_id){
            $body = strip_tags($body);
            if($body != '') {
                $post_date = date("Y-m-d H:i:s");
                $sender_user_id = $this->user_obj->get_user_id();

                if ($sender_user_id == $receiver_user_id) {
                    $receiver_user_id = "none";
                }

                $query = query("INSERT INTO POSTS (post_id,body,sender_user_id,receiver_user_id,post_date,user_closed,deleted,likes)
                VALUES ('', '{$body}', '{$sender_user_id}', '{$receiver_user_id}', '{$post_date}', 'no', 'no', '0')");
                confirm($query);

                $returned_id = get_last_id();

                //update user posts
                $this->user_obj->update_user_post();
            }
        }

    }
?>



