<?php
session_start();	

require_once('models/homeModel.php');
connexion_bd($host,$dbname,$user,$password);

	$baseURL=dirname($_SERVER['SCRIPT_NAME']);

	if (!isset($_GET['module']) || $_GET['module'] =="")
		$page = "home";
	
	else{
		
		if(!file_exists("controllers/".$_GET['module']."Controller.php"))
			$page = "404";
		else
			$page = $_GET['module'];
	}
		
	

	ob_start(); // Arrete l'affichage
	include "controllers/{$page}Controller.php";
	$content = ob_get_contents();
	ob_end_clean(); // relance l'affichage
	
	include "layout.php";
	require_once 'controllers/cronController.php';
	refresh_file($bdd);
	

?>