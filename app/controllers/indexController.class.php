<?php

    class indexController extends viewController{
        public function __construct(
            private $connection = null,
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function index(){

            if($_SESSION['logado'] != true){
                header("location: /login");
                die();
            }

            $this->__set(attr:"title", value:"Hello word");
            $this->__set(attr:"page", value:"index");
            $this->__set(attr:"js", value:"login");
            $this->render();
        }
    }

?>