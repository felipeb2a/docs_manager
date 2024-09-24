<?php
		//Inicia sessao
		session_start();

		//Apagando todos os dados de uma sessão:
		session_unset();

		//Destruindo a sessão:
		session_destroy();

		//redireciona para a pagina de login
		header('location:../paginas/login.php');
?>