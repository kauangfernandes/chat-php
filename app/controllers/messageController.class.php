<?php

    class messageController extends viewController{
        public function __construct(
            private $connection = null,
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function getMessages(){
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
                    $messages = null;
                    
                    $chat = new Chats(id_chat:$_GET['id_chat']);
                    $user = new Users(id_user:$_SESSION['id_user'], chat:$chat);

                    $chatDAO = new ChatDAO(db:$this->connection);
                    $userDados = $chatDAO->verifyUserIntoChat(user:$user);

                    if(is_object($userDados)){
                        $chatDAO = new ChatDAO(db:$this->connection);
                        $messages = $chatDAO->getAllMessageChat(chat:$chat);
                    } else {
                        header("Location: /?acesso=negado");
                    }
                    
                    $messages = json_encode($messages);
                    print_r($messages);
                    return $messages;

                } else {
                    header("Location: /?acesso=negado");
                }
            }
        }
    }

?>