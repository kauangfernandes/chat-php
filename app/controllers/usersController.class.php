<?php

    class usersController extends viewController{
        public function __construct(
            private $connection = null
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function login(){
            $msg_erro = array("", "");
            $erro = false;
            $user = new Users();

            if($_POST){
                
                if(empty($_POST['email'])){

                    $erro = true;
                    $msg_erro[0] = "Preencha o campo email";

                } else {

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $erro = true;
                        $msg_erro[0] = "Preencha com email um email valido!";
                    } else {
                        $user->__set(attr:"email", value:$_POST['email']);
                        $userDAO = new UsersDAO(db:$this->connection);
                        $validacao = $userDAO->bucarEmailUsuario(user:$user, args:"login");
                        unset($userDAO);

                        if(isset($validacao['erro']) && isset($validacao['msg'])){
                            $erro = $validacao['erro'];
                            $msg_erro[0] = $validacao['msg'];
                        }
                    }
                }

                if(empty($_POST['password'])){
                    $erro = true;
                    $msg_erro[1] = "Preencha o campo password!";
                } else {
                    $user->__set(attr:"password", value:$_POST['password']);
                }

                if(!$erro){
                    $userDAO = new usersDAO(db:$this->connection);
                    $validacao = $userDAO->buscarSenhaUsuario($user);

                    if(isset($validacao['erro']) && isset($validacao['msg'])){
                        $erro = $validacao['erro'];
                        $msg_erro[0] = $validacao['msg'];
                    } else {
                        if($_SESSION['email'] != null){
                            header("Location: /?login=sucesso");
                            die();
                        }
                    }
                }
            }

            $this->__set(attr:"results", value:$msg_erro);
            $this->__set("title", "Login");
            $this->__set("page", "login");
            $this->render();
        }

        public function logoff(){
            session_unset();
            session_destroy();
            header("Location: /");
            die();
        }
    }

?>