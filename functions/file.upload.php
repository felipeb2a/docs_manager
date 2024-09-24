<?php
	require_once('../functions/docs.list.php');

	//retornar para pagina principal caso folder vazio
	if(isset($_FILES['file'])){
		$file = $_FILES['file'];
		$types = array( 'pdf', 'conf' );
		$ext = explode('.', $file['name']);
		$ext = strtolower(end($ext));

		if(in_array($ext, $types)){
			if($_POST['dir'] == "$sourceFolder"){
				//upload file
				uploadFile($file, $sourceFolder);
				header('location:../paginas/list.docs.php');
			} else{
				echo $_POST['dir'].$file['name'];
				//upload file
				uploadFile($file, $_POST['dir']);
				header('location:../paginas/folder.show.php?dir='.$_POST['dir']);
			}
		}
	} else{
		header('location:list.docs.php');
	}
?>