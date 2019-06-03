<?php 
function liste_settings($bdd)
{
	$settings=$bdd->query("Select * from settings");
	return $settings->fetchALL();
}
function details_setting($idPlace)
{
	$Place=$bdd->query("Select * from setting where idPlace=".$idPlace);
	return $Place->fetch();
}
function add_setting($nomPlace)
{
	$reqAddPlace=$bdd->query("insert into setting(nomPlace) values('".$nomPlace."')");
}
function update_setting($nomPlace,$idPlace)
{
	$reqUpdatePlace=$bdd->query("update setting SET nomPlace='".$nomPlace."' where idPlace=".$idPlace);
}
function delete_setting($idPlace)
{
			$reqDeletePlace=$bdd->query("delete from setting where idPlace=".$idPlace);
}
?>