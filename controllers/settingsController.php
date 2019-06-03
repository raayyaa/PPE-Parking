<?php
if(is_admin())
{
require_once 'models/settingsModel.php';
include 'views/settingsView.php';
if(isset($_GET['action']))
{$action=$_GET['action'];}
else
{$action='liste';}
switch($action)
{
	case 'liste':$Settings=liste_settings($bdd); afficher_settings($Settings); break;
	case 'form_add': form_add_setting(); break;
	case 'add': $nomSetting=$_REQUEST['nomSetting']; add_setting($bdd,$nomSetting);   header('Location:index.php?module=settings'); break;
	//case 'details':$idSetting=$_GET['idSetting']; form_details_setting($bdd,$idSetting); break;
	case 'form_update': $idSetting=$_GET['idSetting']; form_update_setting($bdd,$idSetting); break;
	case 'update':$idSetting=$_GET['idSetting']; $nomSetting=$_REQUEST['nomSetting'];  update_setting($bdd,$nomSetting,$idSetting);  header('Location:index.php?module=settings'); break;
	case 'delete': $idSetting=$_GET['idSetting']; delete_setting($bdd,$idSetting);  header('Location:index.php?module=settings'); break;
}
}
else
{
	require_once 'controllers/404Controller.php';
	afficher();
}

 ?>