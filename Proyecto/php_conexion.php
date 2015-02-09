<?php
	//$conexion = mysql_connect("mysql8.000webhost.com","a6591137_prueba","fabi1423");
	//mysql_select_db("a6591137_prueba",$conexion);
	
	
	$conexion=mysql_connect("localhost","root","")
	or die("Error al conectar con mysql");
	mysql_select_db("trabajo 2", $conexion)
	or die("Error al conectar con bd");
	
	if(!empty($_SESSION['username']) and !empty($_SESSION['tipo_usu'])){
		$usu=$_SESSION['username'];
		$tip=$_SESSION['tipo_usu'];
	}
	
	
	//$conexion = mysql_connect("localhost","root","");
	//mysql_select_db("datos",$conexion);
	
	date_default_timezone_set("America/Bogota");	
	?>