<?php

    Class Post{
        private $user_obj;
        private $sender_user_id;
        private $body;
        private $receiver_user_id;
        private $deleted;
        private $likes;
        private $post_date;


        public function __construct($user_id,$body,$receiver_user_id='none',$deleted='no',$likes='0'){
            $this->user_obj = new User($user_id);
            $this->sender_user_id = $this->user_obj->get_user_id();
            $this->body = strip_tags($body);;
            $this->receiver_user_id = $receiver_user_id;
            $this->deleted = $deleted;
            $this->likes = $likes;
            $this->post_date = date("Y-m-d H:i:s");;
        }

        public function submitPost(){
            if($this->body != '') {
                if ($this->sender_user_id == $this->receiver_user_id) {
                    $this->receiver_user_id = "none";
                }

                $query = query("INSERT INTO POSTS (post_id,body,sender_user_id,receiver_user_id,post_date,user_closed,deleted,likes)
                VALUES ('', '{$this->body}', '{$this->sender_user_id}', '{$this->receiver_user_id}', '{$this->post_date}', 'no', '{$this->deleted}', '{$this->likes}')");
                confirm($query);

                $returned_id = get_last_id();

                //update user posts number +1
                $this->user_obj->update_user_post();
            }
        }

    }
?>


