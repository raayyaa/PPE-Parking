<?php 
function liste_places($bdd)
{

	$places=$bdd->query("Select * from place");
	return $places->fetchALL();
}
function get_place($bdd,$idPlace)
{
	$Place=$bdd->query("Select * from place where idPlace=".$idPlace);
	return $Place->fetch();
}
function details_place($bdd,$idPlace)
{
	$Place=$bdd->query("Select p.*,r.*,u.* from place p, reservation r, users u where u.idUser= r.idUser and p.idPlace=r.idPlace and r.idPlace=".$idPlace);
	return $Place->fetchALL();
}
function actual_place($bdd,$idPlace)
{
	$Place=$bdd->query("Select p.*,r.*,u.* from place p, reservation r, users u where u.idUser= r.idUser and p.idPlace=r.idPlace and r.idPlace=".$idPlace." and dateDebut<=now() and dateFin>=now()");
	return $Place->fetchALL();
}

function add_place($bdd,$nomPlace)
{
	echo "add place-> Model";
	$reqAddPlace=$bdd->query("insert into place(nomPlace) values('".$nomPlace."')");
}
function update_place($bdd,$nomPlace,$idPlace)
{
	$reqUpdatePlace=$bdd->query("update place SET nomPlace='".$nomPlace."' where idPlace=".$idPlace);
}
function delete_place($bdd,$idPlace)
{
	$reqDeletePlace=$bdd->query("delete from place where idPlace=".$idPlace);
}
function places_dispo ($bdd)
{
	$Places=$bdd->query("SELECT * from place where idPlace not in (SELECT idPlace from reservation where dateDebut <= now() and dateFin >= now())");
	return $Places->fetchALL();

}
?>