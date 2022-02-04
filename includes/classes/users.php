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


    }
?>



