<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Park'in</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom fonts for this tmplate -->
    <link href="tmp/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Plugin CSS -->
    <link href="tmp/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this tmplate -->
    <link href="tmp/css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
	<?php
require_once 'models/clientsModel.php';

	?>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php"><!--<img class="img-responsive" src="tmp/img/logo.png" alt="Park'in logo" width="20%" height="30%">
-->Park'in</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <?php if (is_admin()) { ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Acceuil</a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?module=places">Places</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?module=clients">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?module=file">File d'attente</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?module=reservations">Réservations</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?module=settings">Settings</a>
            </li>
			<?php } ?>
			<li class="nav-item right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li class="nav-item">
              <?php
			  	
if (!is_connected())
	{
		?>
			  <a class="nav-link js-scroll-trigger btn btn-success" href="index.php?module=clients&action=form_connexion"><span class="label label-info">Connexion</span></a>
	<?php } else { ?>
				  <a class="nav-link js-scroll-trigger btn btn-success" href="index.php?module=clients&action=details&idClient=<?= $_SESSION['id']?>"><span class="label label-info"><?= $_SESSION['login'];?></span></a>
	<?php } ?>
		  </li>
			<li class="nav-item">
   <?php
			  	
if (!is_connected())
	{
		?>             
			 <a class="nav-link js-scroll-trigger btn btn-danger" href="index.php?module=clients&action=form_inscription"><span class="label label-warning">Inscription</span></a>
<?php
	} else
	{ ?>
			 <a class="nav-link js-scroll-trigger btn btn-danger" href="index.php?module=clients&action=deconnexion"><span class="label label-warning">Déconnexion</span></a>

	<?php } ?>
		  </li>
          </ul>
        </div>
      </div>
    </nav>

<?= $content ; ?>

    <!-- Bootstrap core JavaScript -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>


	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Plugin JavaScript -->
    <script src="tmp/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="tmp/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="tmp/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

    <!-- Custom scripts for this tmplate -->
    <script src="tmp/js/creative.min.js"></script>
	<script type="text/javascript" src="tmp/js/login_validator.js"></script>
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  </body>

</html>
