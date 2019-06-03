<?php
require('config.php');

//connexion à la bdd
 function connexion_bd($host,$dbname,$user,$password){
		try
	      {
			 global $bdd;
		     $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
	      }
        catch(PDOException $e){
          echo 'Connexion échouée : '.$e->getMessage();
          die();
        }
}

function is_admin()
{
	if(isset($_SESSION['level']) && ($_SESSION['level']==3)) { return true; }  else {return false; }
}
function is_activated()
{
	if(isset($_SESSION['level']) && ($_SESSION['level']==2)) { return true; }  else {return false; }
}


function is_full()
{
	$reqIsFull=$bdd->query("select u.*, r.* from users u,reservations r where rangUser is  null ");
	return($reqIsFull->fetchALL());
}

?>
