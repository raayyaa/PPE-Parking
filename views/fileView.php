<header class="masthead2 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
			  File d'attente
            </h1>
            <hr>
          </div>
          
        </div>
      </div>
    </header>
<?php
function afficher_file($bdd,$Elements)
{
					 require_once 'models/reservationsModel.php';
	?>
	<section>
	      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Rang</th>
				<th>Client</th>
				<th>Date prévue</th>
				<th>Temps d'attente</th>
                <th colspan="3">Opérations</th>
            </tr>
        </thead>
        <tbody>
		<?php
		if($Elements){
	foreach  ($Elements as $Element)
	{
		?>
		<tr>
		<td><?=$Element['rangUser']?></td>
		<td><?=$Element['nomUser']." ".$Element['prenomUser']?></td>
		<td><?php
					 $nextime=time_next($bdd,$Element['idUser']);
					$date = new DateTime($nextime['dateDebut']);
			echo 'Le <strong>'.$date->format('d-m-Y'.'</strong> à '.'H:i:s');
				
	?></td>
		<td>
					 <span id="rebous<?=$Element['rangUser']?>"></span>
		

		<script>
// Set the date we're counting down to
var countDownDate<?=$Element['rangUser']?> = new Date("<?=$nextime['dateDebut'];?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance<?=$Element['rangUser']?> between now an the count down date
  var distance<?=$Element['rangUser']?> = countDownDate<?=$Element['rangUser']?> - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor((distance<?=$Element['rangUser']?>) / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance<?=$Element['rangUser']?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance<?=$Element['rangUser']?> % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance<?=$Element['rangUser']?> % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("rebous<?=$Element['rangUser']?>").innerHTML = "<strong> "+days + " J, " + hours + " H, "
  + minutes + " M et " + seconds + " S </strong>";

  // If the count down is finished, write some text 
  if (distance<?=$Element['rangUser']?> < 0) {
    clearInterval(x);
    document.getElementById("rebous<?=$Element['rangUser']?>").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

		</td>
		<td><?php
		if($Element['rangUser']!=1) { ?>
		<a href="index.php?module=file&action=up_to_file&idUser=<?=$Element['idUser']?>"><i class="fa fa-angle-up"></i></a><?php } ?></td>
		<td><?php $nb=number($bdd);
		if($Element['rangUser']!=$nb['nombre']) { ?>
		<a href="index.php?module=file&action=down_to_file&idUser=<?=$Element['idUser']?>"><i class="fa fa-angle-down"></i></a><?php } ?></td>
		<td><a href="index.php?module=file&action=delete&idUser=<?=$Element['idUser']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée'));"><i class="fa fa-trash-alt"></i></a></td>

		</tr>
	<?php
		}}
		else { echo "<tr><td colspan='4'>Pas de clients en file d'attente pour le moment</td></tr>";
	?>
		<?php } ?>
        <tfoot>
            <tr>
                <th>Rang</th>
				<th>Client</th>
				<th>Date prévue</th>
				<th>Temps d'attente</th>
                <th colspan="3">Opérations</th>
            </tr>
        </tfoot>
    </table>

          </div>
        </div>
      </div>
	
	</section>
	<?php
} 