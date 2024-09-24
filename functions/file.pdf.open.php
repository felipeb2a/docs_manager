<?php
	include_once('../template/header.php');
	require_once('../functions/docs.list.php');

	//open file in browse
	openPDFFile($_GET['dir']);

	//retornar para pagina principal caso folder vazio
	if(empty($_GET['dir'])){
		header('location:list.docs.php');
	}

?>