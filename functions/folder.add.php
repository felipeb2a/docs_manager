<?php
	require_once('../functions/docs.list.php');

	//retornar para pagina principal caso folder vazio
	if($_POST['dir'] == "$sourceFolder"){
		//create folder
		createFolder($sourceFolder.'/'.$_POST['name']);
		header('location:../paginas/list.docs.php');
	} else{
		//create folder
		createFolder($_POST['dir'].$_POST['name']);
		header('location:../paginas/folder.show.php?dir='.$_POST['dir']);
	}

?>