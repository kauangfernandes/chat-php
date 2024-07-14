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
                    SELECT c.id_chat, u.id_user, u.name, u.email  FROM chats c
                    INNER JOIN users u
                    ON(c.id_user_two=u.id_user)
                    WHERE c.id_user_one = ?;
                ";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $user->__get(attr:"id_user"));
                $stm->execute();
                $this->db = null;
                return $stm->FetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

    }
?>