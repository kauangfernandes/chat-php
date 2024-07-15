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
                    SELECT c.*, u1.NAME AS user_one_name, u1.email, u2.NAME AS user_two_name, u2.email
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

    }
?>