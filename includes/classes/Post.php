<?php

    Class Post
    {
        private $sender_user_obj;
        private $post_id;
        private $post_info;


        public function __construct($post_id)
        {
            $this->post_id = $post_id;
            $query = query("SELECT * FROM posts WHERE post_id ='$post_id'");
            $this->post_info = mysqli_fetch_array($query);
            $this->sender_user_obj = new User($this->post_info["sender_user_id"]); //post owner (sender)
        }

        public function get_post_info(){
            return $this->post_info;
        }

        public function get_post_id(){
            return $this->post_id;
        }

        public function get_sender_user_id(){
            return $this->post_info['sender_user_id'];
        }

        public function get_receiver_user_id(){
            return $this->post_info['receiver_user_id'];
        }

        public static function submitPost($sender_user_id, $body, $receiver_user_id = 'none', $deleted = 'no', $likes = '0')
        {
            $body = str_replace('\r\n', '<br>', strip_tags($body)); // strip html tags and support multiline posts text
            $post_date = date("Y-m-d H:i:s");
            if ($body != '') { //block empty status
                if ($sender_user_id == $receiver_user_id) {
                    $receiver_user_id = "0";
                }

                //inserting the post to posts table
                $query = query("INSERT INTO POSTS (post_id,body,sender_user_id,receiver_user_id,post_date,user_closed,deleted,likes)
                VALUES ('', '{$body}', '{$sender_user_id}', '{$receiver_user_id}', '{$post_date}', 'no', '{$deleted}', '{$likes}')");
                confirm($query);

                //$returned_id = get_last_id();

                //update user posts number +1
                $user_obj= new User($sender_user_id);
                $user_obj->update_user_posts_count();
            }
        }

        public function add_comment($body){
            $sender_user_id = $this->get_sender_user_id();
            $receiver_user_id = $this->get_receiver_user_id();
            $comment_date = date("Y-m-d H:i:s");
            $query = query("INSERT INTO COMMENTS (comment_id,comment_body,sender_user_id,receiver_user_id,comment_date,removed,post_id)
                VALUES ('', '{$body}', '{$sender_user_id}', '{$receiver_user_id}', '{$comment_date}', '{$deleted}', '{post_id}')");
            confirm($query);
        }

    }


?>



