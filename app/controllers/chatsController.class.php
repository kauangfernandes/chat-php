<?php

    class chatsController extends viewController{
        public function __construct(
            private $connection = null,
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function entrarChat(){

            if($_SESSION['logado'] != true){
                header("location: /login");
                die();
            }

            $this->__set(attr:"title", value:"Chat Privado");
            $this->__set(attr:"page", value:"chat");
            $this->render();
        }
    }

?>