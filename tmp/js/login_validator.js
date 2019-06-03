function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
function verifPseudo(champ)
{
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
	  $('#statut').html('Format e-mail requis');
      //return false;
   }
   else
   {
      surligne(champ, false);
      //return true;
   }
$('#username').keyup(function()
{

	var username=$('#username').val();
	$('#statut').html('<img width="15%" height="15%" src="tmp/img/loader.gif">');
	
	if(username!='')
	{
		$.post('models/check_user.php',{username:username},
		function (data)
		{
			      surligne(champ, true);

			$('#statut').html(data);
			return false;
		});
	}
	else
	{
		 surligne(champ, false);

		$('#statut').html('');
		return true;
	}
	
});
 
}