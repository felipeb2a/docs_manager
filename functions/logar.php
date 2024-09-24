<?php
	require_once('../includes/session.php');
	require_once('../dao/usersDao.php');

	$user = login($_POST['login']);
	$hash = '';
	$type = '';

	//loop user
	while($u = mysqli_fetch_array($user)){
		$hash = $u['password'];
		$type = $u['isAdmin'];
	}
	
	// Verify the hash code against the unencrypted password entered 
  	$verify = password_verify($_POST['password'], $hash);
  
  	// Print the result depending if they match 
  	if ($verify) {
    	//salva session id
		$_SESSION['session_id'] = session_id();

		//salvando usuario na sessao
		$_SESSION['user'] = $_POST['login'];

		//salvando usuario na sessao
		$_SESSION['type'] = $type;

		//redireciona para a página
		header('location:../index.php');
	}
 
  	else { 
      	//Apagando todos os dados de uma sessão:
		session_unset();
		//Destruindo a sessão:
		session_destroy();	
		//redireciona para a página
		header('location:../paginas/login.php');
    } 

	/* end */
?>