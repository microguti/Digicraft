<?php
	#start session:
	session_start();
	
	unset($_SESSION['username']); //delete the username key
	//session_destroy(); //borra all of the session keys
	
	header('Location: login.php');
?>