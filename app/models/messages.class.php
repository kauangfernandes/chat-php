<?php
    class Messages{
        public function __construct(
            private int $id_message = 0,
            private string $message = "",
            private bool $viwed = false,
            private string $send_date = "",
            private string $viewing_date = "",
        ){}

        public function __get(string $attr){
            return $this->$attr;
        }

        public function __set(string $attr, $value){
            $this->$attr = $value;
        }
    }
?>