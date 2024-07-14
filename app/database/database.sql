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
("Sandra", "sam@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW");

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
(1, 2);

DROP TABLE IF EXISTS messages;
CREATE TABLE messages(
	id_messages INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	message VARCHAR(250) NOT NULL,
	#viewed BOOL NOT NULL DEFAULT 0,
	#send_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	#viewing_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	
	id_user INT NOT NULL,
	FOREIGN KEY (id_user) REFERENCES users (id_user),
	
	id_chat INT NOT NULL,
	FOREIGN KEY (id_chat) REFERENCES chats (id_chat)
);

USE chat;
INSERT INTO messages (message, id_user, id_chat) VALUES
("Oi, Sam", 1, 1),
("Oi, Kauan", 2, 1);