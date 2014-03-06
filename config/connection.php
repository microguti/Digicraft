<?php
	# Database Connection Here...
	$dbc = mysqli_connect('localhost', 'dev', 'dev', 'atomcms') OR die('No puedo conectar la base de datos: '.mysqli_connect_error());
?>