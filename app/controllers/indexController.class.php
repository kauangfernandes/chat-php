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

            $user = new Users();
            $user->__set(attr:"id_user", value:$_SESSION['id_user']);

            $chatDAO = new ChatDAO(db:$this->connection);
            $chats = $chatDAO->srcAllChatsUsers(user:$user);

            $this->__set(attr:"title", value:"Hello word");
            $this->__set(attr:"results", value:$chats);
            $this->__set(attr:"page", value:"index");
            $this->__set(attr:"js", value:"login");
            $this->render();
        }
    }

?>