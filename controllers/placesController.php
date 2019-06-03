<?php
if(is_admin())
{
require_once 'models/placesModel.php';
include 'views/placesView.php';
if(isset($_GET['action']))
{$action=$_GET['action'];}
else
{$action='liste';}
switch($action)
{
	case 'liste':$Places=liste_places($bdd); afficher_places($bdd,$Places); break;
	case 'form_add': form_add_place(); break;
	case 'add': $nomPlace=$_REQUEST['nomPlace']; add_place($bdd,$nomPlace);   header('Location:index.php?module=places'); break;
	case 'details':$idPlace=$_GET['idPlace']; form_details_place($bdd,$idPlace); break;
	case 'form_update': $idPlace=$_GET['idPlace']; form_update_place($bdd,$idPlace); break;
	case 'update':$idPlace=$_GET['idPlace']; $nomPlace=$_REQUEST['nomPlace'];  update_place($bdd,$nomPlace,$idPlace);  header('Location:index.php?module=places'); break;
	case 'delete': $idPlace=$_GET['idPlace']; delete_place($bdd,$idPlace);  header('Location:index.php?module=places'); break;
}
}
else
{
	require_once 'controllers/404Controller.php';
	afficher();
}
 ?>