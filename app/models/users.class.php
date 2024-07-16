<?php
    class Users {
        public function __construct(
            private int $id_user = 0,
            private string $name = "",
            private string $email = "",
            private string $password = "",

            private string $message = "",
            private string $send_date = "",
            private $chat = null
        ){
            $message = new Messages(message:$this->message);
        }

        public function __get(string $attr){
            return $this->$attr;
        }

        public function __set(string $attr, $value){
            $this->$attr = $value;
        }


        public function passwordHash(){
            $this->password = $password = password_hash($this->password, PASSWORD_DEFAULT);;
        }
    
        public function passwordVerify($password){
            return $password = password_verify($this->password, $password);
        }
    }
?>