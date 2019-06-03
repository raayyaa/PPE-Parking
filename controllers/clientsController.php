<?php
require_once 'models/clientsModel.php';
include 'views/clientsView.php';
if(isset($_GET['action']))
{$action=$_GET['action'];}
else
{$action='liste';}
switch($action)
{
	case 'liste':if ($_SESSION['connected'] && $_SESSION['level']==3) { $Clients=liste_clients($bdd); afficher_clients($Clients);} else { header('Location:index.php?module=404');}; break;
	case 'form_add':  form_add_client();  break;
	case 'form_inscription': form_inscription(); break;
	case 'get':$idClient=$_GET['idClient']; get_client($bdd,$idClient); break;
	case 'add': $nomUser=$_REQUEST['nomUser']; $prenomUser=$_REQUEST['prenomUser']; $telUser=$_REQUEST['telUser']; $passwordUser=$_REQUEST['passwordUser']; $mailUser=$_REQUEST['mailUser']; ajouter_client($nomUser,$prenomUser,$mailUser,$passwordUser,$telUser,$bdd);   break;
	case 'details':$idClient=$_REQUEST['idClient']; form_details_client($bdd,$idClient); break;
	case 'form_update': $idClient=$_GET['idClient']; form_update_client($bdd,$idClient); break;
	case 'update':$idUser=$_GET['id']; $nomUser=$_REQUEST['nomUser']; $prenomUser=$_REQUEST['prenomUser']; $telUser=$_REQUEST['telUser']; $passwordUser=$_REQUEST['passwordUser']; $mailUser=$_REQUEST['mailUser']; update_client($nomUser,$prenomUser,$mailUser,$passwordUser,$telUser,$idUser,$bdd);  header('Location:index.php?module=clients');  break;
	case 'delete': $idClient=$_GET['idClient']; delete_client($bdd,$idClient);  header('Location:index.php?module=clients'); break;
	case 'form_connexion' : form_connexion(); break;
	case 'connexion' : $mailUser=$_REQUEST['mailUser']; $passwordUser=$_REQUEST['passwordUser']; if(connecter($bdd,$mailUser,$passwordUser)) { header('Location:index.php'); } else {header('Location:index.php?module=clients&action=form_connexion&erreur=true');} break;
	case 'deconnexion':deconnecter();  header('Location:index.php');  header('Location:index.php'); break;
	case 'activate': if ($_SESSION['connected'] && $_SESSION['level']==3) {$idUser=$_REQUEST['idUser']; activate_client($bdd,$idUser);   header('Location:index.php?module=clients'); } else { header('Location:index.php?module=404');}; break;
	case 'desactivate':if ($_SESSION['connected'] && $_SESSION['level']==3) {$idUser=$_REQUEST['idUser']; desactivate_client($bdd,$idUser);  header('Location:index.php?module=clients'); } else { header('Location:index.php?module=404');}; break;

	}
 ?>