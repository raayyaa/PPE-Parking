<?php

require_once('homeModel.php');
connexion_bd($host,$dbname,$user,$password);
if (isset($_POST['username']))
{
	$username=$_POST['username']; 
	if(!empty($username))
	{
	$User=$bdd->prepare("Select * from users where mailUser = ?");
	$User->execute(array($username));
	if($User->fetch())
	{ echo "Déja existant"; }
	}
	else
	{
		echo "Login non attribué";
	}
}
else echo "aaa333";
?>