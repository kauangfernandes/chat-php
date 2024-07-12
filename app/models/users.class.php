<?php
    class Users {
        public function __construct(
            private int $id_user = 0,
            private string $name = "",
            private string $email = "",
            private string $password = ""
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