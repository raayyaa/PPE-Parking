<?php
require_once 'models/fileModel.php';
include 'views/fileView.php';
if(isset($_GET['action']))
{$action=$_GET['action'];}
else
{$action='liste';}
switch($action)
{
	case 'liste':$Elements=liste_file($bdd); afficher_file($bdd,$Elements); break;
	case 'number': number($bdd); break;
	case 'add': $idUser=$_REQUEST['idUser']; add_to_file($bdd,$idUser);   header('Location:index.php?module=file'); break;
	case 'up_to_file': $idUser=$_REQUEST['idUser']; up_to_file($bdd,$idUser); header('Location:index.php?module=file'); break;
	case 'down_to_file': $idUser=$_REQUEST['idUser']; down_to_file($bdd,$idUser);  header('Location:index.php?module=file'); break;
	case 'delete': $idUser=$_REQUEST['idUser']; delete_from_file($bdd,$idUser);   header('Location:index.php?module=file'); break;
	
}
 ?>