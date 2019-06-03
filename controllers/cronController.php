<?php
include 'models/cronModel.php';
if(isset($_GET['action']))
{$action=$_GET['action'];}
else
{$action='refresh_file';}
switch($action)
{
	case 'refresh_file': refresh_file($bdd); break;
}

?>