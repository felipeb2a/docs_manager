<?php
	if(! $logado){
        header('location:../paginas/login.php');
        die('Você não tem permissão para acessar essa página!');
    }
?>