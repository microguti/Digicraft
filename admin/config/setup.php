<?php

	//Pagina de setup
	$site_title = 'Pagina realmene dinamica';

	//Conexion base de datos
	include('../config/connection.php');
	
	#Constantes:
	DEFINE('D_TEMPLATE', 'template');
	
	#Funciones:
	include('functions/data.php');
	include('functions/template.php');
	
	#Site Setup:
	$debug = data_setting_value($dbc, 'debug-status');
	
	if(isset($_GET['page'])){
		$pageid = $_GET['page'];
	} else {
		$pageid =  1;
	}
	
	//Page Setup
	$page = data_page($dbc, $pageid);
	
	//User Setup
	
	$user = data_user($dbc, $_SESSION['username']);
?> 