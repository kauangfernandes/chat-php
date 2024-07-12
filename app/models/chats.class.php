<?php
    class Chats{
        public function __construct(
            private int $id_chat = 0,
            private $user_one = null,
            private $user_two = null
        ){

        }

        public function __get(string $sttr){
            return $this->$sttr;
        }

        public function __set(string $sttr, $value){
            $this->$sttr = $value;
        }
    }

?>