<?php
    class ChatDAO{
        public function __construct(
            private $db = null
        ){
        }

        public function __destruct(){}

        public function srcAllChatsUsers($user){
            try {
                $sql = "
                    SELECT c.*, u1.NAME AS user_one_name, u1.email email_user_one, u2.NAME AS user_two_name, u2.email email_user_two
                    FROM chats c
                    INNER JOIN users u1 ON c.id_user_one = u1.id_user
                    INNER JOIN users u2 ON c.id_user_two = u2.id_user
                    WHERE c.id_user_one = ? OR c.id_user_two = ?
                ";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $user->__get(attr:"id_user"));
                $stm->bindValue(2, $user->__get(attr:"id_user"));
                $stm->execute();
                $this->db = null;
                return $stm->FetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function getAllMessageChat($chat){
            try {
                $sql = "
                    SELECT * 
                    FROM messages 
                    WHERE id_chat = ?
                ";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $chat->__get(attr:"id_chat"));
                $stm->execute();
                $this->db = null;
                return $stm->FetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function verifyUserIntoChat($user){
            try {
                $sql = "
                    SELECT c.*, u1.NAME AS user_one_name, u1.email email_user_one, u2.NAME AS user_two_name, u2.email email_user_two
                    FROM chats c
                    INNER JOIN users u1 ON c.id_user_one = u1.id_user
                    INNER JOIN users u2 ON c.id_user_two = u2.id_user
                    WHERE c.id_chat = ? AND (c.id_user_one = ? OR c.id_user_two = ?)
                ";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $user->__get(attr:"chat")->__get(attr:"id_chat"));
                $stm->bindValue(2, $user->__get(attr:"id_user"));
                $stm->bindValue(3, $user->__get(attr:"id_user"));
                $stm->execute();
                $this->db = null;
                return $stm->Fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

    }
?>