<?php

    class chatsController extends viewController{
        public function __construct(
            private $connection = null,
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function entrarChat(){
            $msg_erro = array("");
            $erro = false;


            if($_SESSION['logado'] != true){
                header("location: /login");
                die();
            }

            if($_POST){
                if(empty($_POST['menssagem'])){
                    $erro = true;
                    $msg_erro[0] = "Preencha o campo!";
                } else {
                    if(strlen($_POST['menssagem']) > 250){
                        $erro = true;
                        $msg_erro[0] = "A quantidade máxima de caracteres permitida para mensagens é de 250. Você digitou: ".strlen($_POST['menssagem']);
                    }
                }

                if(!$erro){

                    $chat = new Chats(id_chat:$_GET['id_chat']);
                    $user = new Users(id_user:$_SESSION['id_user'], message:$_POST['menssagem'], chat:$chat);

                    $messageDAO = new MessageDAO(db:$this->connection);
                    $validacao = $messageDAO->enviarMenssagem(user:$user);

                    if($validacao){
                        if($_GET){
                            if(
                                (isset($_GET['id_chat']) && !empty($_GET['id_chat']) > 0) && (
                                    (isset($_GET['id_user_one']) && !empty($_GET['id_user_one']) > 0) || 
                                    (isset($_GET['id_user_two']) && !empty($_GET['id_user_two']) > 0)
                                )
                            ){
                                if(isset($_GET['id_user_one'])){
                                    $url = "?id_chat={$_GET['id_chat']}&id_user_one={$_GET['id_user_one']}&menssagem=enviada";
                                } else {
                                    $url = "?id_chat={$_GET['id_chat']}&id_user_two={$_GET['id_user_two']}&menssagem=enviada";
                                }

                                header("Location: /chat{$url}");
                            } else {
                                header("Location: /?acesso=negado");
                            }
                        }
                    }
                }
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
            $this->__set(attr:"results", value:$msg_erro);

            $this->__set(attr:"title", value:"Chat Privado");
            $this->__set(attr:"page", value:"chat");
            $this->__set(attr:"js", value:"chat");

            $this->render();
        }
    }

?>