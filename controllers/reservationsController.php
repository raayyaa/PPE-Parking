<?php
require_once 'models/reservationsModel.php';
include 'views/reservationsView.php';
if(isset($_GET['action']))
{$action=$_GET['action'];}
else
{$action='afficher';}
switch($action)
{
	case 'afficher':$Places=liste_reservations($bdd); afficher($bdd,$Places); break;
	case 'form_add': $idUser=$_REQUEST['idUser']; $idPlace=$_REQUEST['idPlace']; add_reservation($bdd,$idUser,$idPlace); break;
	case 'add': $idPlace=$_REQUEST['idPlace']; $idUser=$_REQUEST['idUser']; add_reservation($bdd,$idUser,$idPlace);  header('Location: index.php');  break;
	case 'details':$idPlace=$_GET['idPlace']; form_details_reservation($bdd,$idPlace); break;
	case 'form_update': $idPlace=$_GET['idPlace']; form_update_reservation($bdd,$idPlace); break;
	case 'update':$idPlace=$_GET['idPlace']; $nomPlace=$_REQUEST['nomPlace'];  update_reservation($bdd,$nomPlace,$idPlace);  header('Location:index.php?module=reservations'); break;
	case 'delete': $idPlace=$_GET['idPlace']; delete_reservation($bdd,$idPlace);  header('Location:index.php?module=reservations'); break;
	

}
 ?>