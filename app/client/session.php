<?php
	if(!isset($_SESSION)){
		session_start();

		if(!isset($_SESSION["id_user"])){
			$_SESSION["id_user"] = 0;
		}

		if(!isset($_SESSION["nome"])){
			$_SESSION["nome"] = null;
		}

		if(!isset($_SESSION["email"])){
			$_SESSION["email"] = null;
		}

		if(!isset($_SESSION["logado"])){
			$_SESSION["logado"] = false;
		}
	}
?>