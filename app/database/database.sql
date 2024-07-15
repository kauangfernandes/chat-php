DROP DATABASE IF EXISTS chat;
CREATE DATABASE chat;
USE chat;

DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NAME VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	PASSWORD VARCHAR(128) NOT NULL
);

USE chat;
INSERT INTO users (NAME, email, PASSWORD) VALUES 
("Kauan", "kauan@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW"),
("Sandra", "sam@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW"),
("X", "x@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW"),
("Y", "y@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW");

#PASSWORD => senha1234;
DROP TABLE IF EXISTS chats;
CREATE TABLE chats(
	id_chat INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	
	#Usuário que enviou.
	id_user_one INT NOT NULL,
	FOREIGN KEY (id_user_one) REFERENCES users (id_user),
	
	#Usuário que faz parte do chat.
	id_user_two INT NOT NULL,
	FOREIGN KEY (id_user_two) REFERENCES users (id_user)
);

USE chat;
INSERT INTO chats (id_user_one, id_user_two) VALUES
(1,2),
(1,3),
(2,3);

DROP TABLE IF EXISTS messages;
CREATE TABLE messages(
	id_messages INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	message VARCHAR(250) NOT NULL,
	
	id_user INT NOT NULL,
	FOREIGN KEY (id_user) REFERENCES users (id_user),
	
	id_chat INT NOT NULL,
	FOREIGN KEY (id_chat) REFERENCES chats (id_chat)
);

USE chat;
INSERT INTO messages (message, id_user, id_chat) VALUES
("Oi, Sam", 1, 1),
("Oi, Kauan", 2, 1),
("Oi, X", 1, 2),
("Oi, Kauan", 3, 2);


/*
SELECT *  FROM chats c
INNER JOIN users u
ON(c.id_user_one=u.id_user OR c.id_user_two=u.id_user)
WHERE u.id_user = 2

SELECT c.*, u1.NAME AS user_one_name, u2.NAME AS user_two_name
FROM chats c
INNER JOIN users u1
ON c.id_user_one = u1.id_user
INNER JOIN users u2
ON (
    c.id_user_one = u2.id_user AND c.id_user_two = 1
    OR
    c.id_user_two = u2.id_user AND c.id_user_one = 1
 )
  
  
SELECT 
	(SELECT id_user FROM users WHERE id_user = 1) "id_user_1",
	(SELECT name FROM users WHERE id_user= 1) "nome_1"
FROM chats
WHERE id_user_one = 1 OR id_user_two = 1;
*/

SELECT c.*, u1.NAME AS user_one_name, u1.email, u2.NAME AS user_two_name, u2.email
FROM chats c
INNER JOIN users u1 ON c.id_user_one = u1.id_user
INNER JOIN users u2 ON c.id_user_two = u2.id_user
WHERE c.id_user_one = 2 OR c.id_user_two = 2


SELECT * 
FROM messages 
WHERE id_chat = 1

