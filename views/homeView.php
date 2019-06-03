    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Park'in</strong>
			  <?php 
			  require_once 'models/clientsModel.php';
			  if (is_admin()) { ?> <h4>Adminisration</h4> 
			  
			  <?php } else {?>  <h4>Résrevez votre place de parking!!</h4> 
			  
<?php } ?>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
		  <?php if (!is_admin() && is_activated()) {
			 
				 if($Placenow=already_reserved($bdd,$_SESSION['id']))
				 {
					 ?>
					 <p class="text-faded mb-5">Vous êtes actuellement à la place : <strong><?=$Placenow['nomPlace']?></p>
					 <?php
				 }else{
			 
			 require_once 'models/placesModel.php';
			 $Places=places_dispo($bdd);
			 if($Places)
			 {
				 ?>
				 <form>
					<div class="form-group">
					 <div class="col-xs-3">
    <label for="exampleFormControlSelect1">Choisissez la place</label>
    <select class="form-control" id="exampleFormControlSelect1" name="idPlace">
      <?php
	  foreach ($Places as $Place)
	  {
		  ?>
		  <option value="<?=$Place['idPlace'];?>"><?=$Place['nomPlace'];?></option>
		  <?php 
	  }
	  ?>
    </select>
  </div>
  </div>
    			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" value="Réserver"/>
				<input type="hidden" name="module" value="reservations"/>
				<input type="hidden" name="action" value="add"/>
				<input type="hidden" name="idUser" value="<?=$_SESSION['id']?>"/>
				</div>

 
					</form></p><?php
			 }
			 else {
				require_once 'models/clientsModel.php';
				$Client=get_client($bdd,$_SESSION['id']);
				if (($Client['rangUser'])){
					?>
					 <p class="text-faded mb-5">Vous êtes en file d'attente, votre rang est : <?=$Client['rangUser']; ?> </p>
					 <p class="text-faded mb-5">Votre temps d'attente est estimé à : 
					 <span id="rebous"></span>
					 <?php
					 
					 require_once 'models/reservationsModel.php';
					 $nextime=time_2next($bdd,$_SESSION['id']);
					 
					 ?>
					 </p>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?=$nextime['dateDebut'];?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("rebous").innerHTML = "<strong> "+days + " jours, " + hours + " heures, "
  + minutes + " minutes et " + seconds + " secondes </strong>";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("rebous").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

			<?php
				}
				else
				{
			 ?>
			  <p class="text-faded mb-5">Malheureusement, aucune place n'est disponible pour le moment</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php?module=file&action=add&idUser=<?=$_SESSION['id']?>">Passer en file d'attente</a>
			<p class="text-faded mb-5">Votre rang dans la file d'attente sera : 
			<?php
			require_once'models/fileModel.php';
			echo next_in_file($bdd);
			
			?>
			</p>
			
			
			<p class="text-faded mb-5"> Votre temps d'attente est estimé à: 
			<span id="rebous"></span>
					 <?php
					 
					 require_once 'models/reservationsModel.php';
					 $nextime=time_2next($bdd,$_SESSION['id']);
					 
					 ?>
					 </p>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?=$nextime['dateDebut'];?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("rebous").innerHTML = "<strong> "+days + " jours, " + hours + " heures, "
  + minutes + " minutes et " + seconds + " secondes </strong>";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("rebous").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
			
			
			
			
			 <?php } }
		  }
			 ?>
			<?php
		  }
		    elseif(!is_connected()) {?>
            <p class="text-faded mb-5">Pour réserver votre place, veuillez vous connecter</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php?module=clients&action=form_connexion">Connexion</a>
		  <?php }
			elseif(!is_activated() && (!is_admin()))
			{
		  ?>
		  			  <p class="text-faded mb-5">Malheureusement, votre compte n'est pas encore activé par l'administrateur</p>
					  <p class="text-faded mb-5">Veuillez vous reconnecter ultérieurement</p>

		  <?php
			}
		  ?>
          </div>
        </div>
      </div>
    </header>