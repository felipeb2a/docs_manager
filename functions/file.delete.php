<?php
	require_once('../functions/docs.list.php');

	//retornar para pagina principal caso folder vazio
	if(empty($_GET['delete'])){
		header('location:list.docs.php');
	} else{		

		//name current folder
		$strArrayFolder = explode("/", $_GET['delete']);
		
		//delete folder
		removeFile($_GET['delete']);

		//$currentFolder = end($strArrayFolder);

		//return to previous folder
		$lastElement = array_pop($strArrayFolder);
		$currentFolder = $lastElement;
		$previousFolder = '';

		if((implode('/', $strArrayFolder)) == "../docs" || (implode('/', $strArrayFolder)) == "..")
			$previousFolder = "list.docs.php";
		else
			$previousFolder = "folder.show.php?dir=".implode('/', $strArrayFolder)."/";

		if(!(empty($previousFolder))){
			header('location:../paginas/'.$previousFolder);
		}
	}

?>