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

            if($_GET){
                if(
                    (isset($_GET['id_chat']) && !empty($_GET['id_chat']) > 0) && (
                        (isset($_GET['id_user_one']) && !empty($_GET['id_user_one']) > 0) || 
                        (isset($_GET['id_user_two']) && !empty($_GET['id_user_two']) > 0)
                    )
                ){
                    $chat = new Chats(id_chat:$_GET['id_chat']);
                    $user = new Users(id_user:$_SESSION['id_user']);

                    $userDAO = new UsersDAO(db:$this->connection);

                    if(isset($_GET['id_user_one'])){
                        $user_one = new Users(id_user:$_GET['id_user_one']);
                        $userDados = $userDAO->bucarDadosUsuarioId($user_one);
                    } else {
                        $user_two = new Users(id_user:$_GET['id_user_two']);
                        $userDados = $userDAO->bucarDadosUsuarioId($user_two);
                    }

                    if(is_object($userDados)){
                        $this->__set(attr:"results", value:$userDados);
                    } else {
                        header("Location: /?acesso=negado");
                    }

                } else {
                    header("Location: /?acesso=negado");
                }


            }else {
                header("Location: /?acesso=negado");
            }

            $this->__set(attr:"title", value:"Chat Privado");
            $this->__set(attr:"page", value:"chat");
            $this->__set(attr:"js", value:"chat");

            $this->render();
        }
    }

?>