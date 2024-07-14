<?php

    class viewController{
        public function __construct(
            protected string $title = "",
            protected string $nameApp = "Chat",
            protected string $template = "default",
            protected string $page = "not_found",
            protected array $css = array("styles"),
            protected array $js = array("index"),
            protected array $results = array(),
            protected $object = null
        ){
            $this->object = new \stdClass();
            require_once "../app/client/session.php";
        }

        public function render(){
            if(isset($this->page) AND $this->page != "not_found"){

                $title = $this->title;
                $nameApp = $this->nameApp;
                $page = $this->page;
                $css = $this->css;
                $js = $this->js;
                $results = $this->results;
                $object = $this->object;
                
            } else {
                $page = "not_found";
                $title = "Erro 404";
            }

            require_once "../app/views/template/{$this->template}.php";
        }

        public function __get(String $attr){
            return $this->$attr;
        }

        public function __set(String $attr, $value){
            if(is_array($this->$attr)){
                $this->$attr[] = $value;
            } else {
                $this->$attr = $value;
            }
        }
        
    }

?>