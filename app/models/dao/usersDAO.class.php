<?php
    class UsersDAO{
        public function __construct(
            private $db = null
        ){
        }

        public function __destruct(){}

        public function srcAllUsers($user){
            try {
                $sql = "SELECT * FROM users";
                $stm = $this->db->prepare($sql);
                $stm->execute();
                $this->db = null;
                return $stm->FetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function bucarEmailUsuario($user, $args){
            $erro = false;
            $sql = "SELECT email FROM users WHERE email = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $user->__get(attr:"email"));
                $stm->execute();
                $this->db = null;

                $email = $stm->Fetch(PDO::FETCH_OBJ);

                if($args == 'login'){

                    if(is_object($email)){
                        return false;
                    } else {
                        return array(
                            "erro" => true,
                            "msg" => "E-mail não encontrado."
                        );
                    }
                }

                if($args == 'cadastro'){

                    if(is_object($email)){
                        return array(
                            "erro" => true,
                            "msg" => "E-mail já cadastrado, use outro email ou faça:<a class='nav-link text-dark' href='http://localhost/Trufarly.com.br/login'>Login</a>"
                        );
                    } else {
                        return true;
                    }
                }


                if($args == 'edit'){
                    if(is_object($email)){
                        return array(
                            "erro" => true,
                            "msg" => "E-mail já cadastrado, use outro."
                        );
                    } else {
                        return true;
                    }
                }
                
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function buscarSenhaUsuario($user){
            $sql = "SELECT password FROM users WHERE email = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $user->__get(attr:"email"));
                $stm->execute();

                $password = $stm->Fetch(PDO::FETCH_OBJ);
                $password = $password->password;
                $validacao = $user->passwordVerify(password:$password);

                if($validacao){
                    
                    $user = $this->bucarDadosUsuario($user);
                    $this->db = null;

                    if(is_object($user)){
                        $_SESSION['logado'] = true;
                        $_SESSION['nome'] = $user->name;
                        $_SESSION['email'] = $user->email; 
                        $_SESSION['id_user'] = $user->id_user;
                    }

                } else {
                    $this->db = null;
                    return array(
                        "erro" => true,
                        "msg" => "Credenciais não são validas."
                    );
                }

            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function bucarDadosUsuario($user){
            $sql = "
                    SELECT id_user , name, email
                    from users 
                    where email = ?
                ";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $user->__get(attr:"email"));
                $stm->execute();
                $this->db = null;
                return $stm->Fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

    }
?>