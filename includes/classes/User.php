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
            return $this->user_info["first_name"] . " " .$this->user_info["last_name"];
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


        public function update_user_post(){
            $new_post_num = $this->get_user_posts_num() + 1 ;
            $user_id = $this->get_user_id();
            $query = query("UPDATE USERS SET NUM_POSTS = '$new_post_num' WHERE ID='$user_id'");
            confirm($query);
        }


    }
?>



