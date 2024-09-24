<?php
	require_once('../includes/session.php');
	require_once('../dao/usersDao.php');

	$status = '';

	// The unencrypted password to be hashed 
	$unencrypted_password = $_POST['password']; 
	  
	// The hash of the password can be saved in the database
	$hash = password_hash($unencrypted_password, PASSWORD_DEFAULT); 
	  
	// Print the generated hash code
	//echo "Generated hash code: ".$hash; 

    /* print test */
	//echo '[name: '.$_POST['name'].'] - [ email: '.$_POST['email'].'] - [password: '.$_POST['password'].'] - [isActive: '.$_POST['isActive'].'] - [isAdmin: '.$_POST['isAdmin'].']</br>';
	
	/* save database */
	$sql = "insert into users (name, email, password, isActive, isAdmin) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$hash."', '".$_POST['isActive']."', '".$_POST['isAdmin']."')";

	$status = saveUser($sql);
	
	include_once('../paginas/page-status.php'); //inclui pagina de status envio form
	
	/* end */
?>