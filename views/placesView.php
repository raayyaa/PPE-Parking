<header class="masthead2 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
			  Gestion des places
            </h1>
            <hr>
          </div>
          
        </div>
      </div>
    </header>
<?php
function afficher_places($bdd,$Places)
{
	?>
	<section>
	      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
		  <div style="float: right;padding:12px 30px 14px"><a href="index.php?module=places&action=form_add" class="btn btn-b btn-sm smooth"><i class="fa fa-plus"></i> Ajouter une place</a></div>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
				<th>Etat</th>
                <th colspan="2">Opérations</th>
            </tr>
        </thead>
        <tbody>
		<?php
	foreach  ($Places as $Place)
	{
		?>
		<tr>
		<td><a href="index.php?module=places&action=details&idPlace=<?=$Place['idPlace']?>"><?= $Place['nomPlace'];?></a></td>
		<td><?php
				$P=actual_place($bdd,$Place['idPlace']);
				if(($P) &&($P[0]['dateDebut']<= date("Y-m-d H:i:s")) && ($P[0]['dateFin']>= date("Y-m-d H:i:s"))){
				echo "<span class='btn btn-danger' >Occupée par <strong>".$P[0]['nomUser']." ".$P[0]['prenomUser']."</strong></span>";}
				else{
			echo "<span class='btn btn-success' >Libre</span>";}

		?></td>
		<td><a href="index.php?module=places&action=form_update&idPlace=<?=$Place['idPlace']?>"><i class="fa fa-edit"></i></a></td>
		<td><a href="index.php?module=places&action=delete&idPlace=<?=$Place['idPlace']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée'));"><i class="fa fa-trash-alt"></i></a></td>
		</tr>
	<?php
	}
	?>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Etat</th>
				<th colspan="2">Opérations</th>
            </tr>
        </tfoot>
    </table>

          </div>
        </div>
      </div>
	</section>
	
	<?php
} 
function form_add_place()
{
	?>
	<section>
      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto">
		  <h2>Ajouter une place</h2>
	<form>
  <div class="form-group">
    <label for="nomUser">Nom</label>
    <input type="text" class="form-control"  placeholder="Nom de la place" name="nomPlace">
  </div>
 <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter" />
	 <input type="hidden" name="module" value="places" />
	<input type="hidden" name="action" value="add" />
</form>
</div>
</div>
</div>
	</section>
	<?php
}

function form_update_place($bdd,$idPlace)
{
	$Place=get_place($bdd,$idPlace);
	?>
	<section>
      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto">
		  		  <h2>Modifier une place : <?=$Place['nomPlace']?></h2>

	<form>
  <div class="form-group">
    <label for="nomUser">Nom</label>
    <input type="text" class="form-control"  placeholder="Nom de la place" name="nomPlace" value="<?= $Place['nomPlace']; ?>" />
  </div>
 <input type="submit" class="btn btn-primary" name="ajouter" value="Modifier" />
	 <input type="hidden" name="module" value="places" />
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="idPlace" value="<?= $idPlace; ?>" />
</form>
</div>
</div>
</div>
</section>
	<?php
}
function form_details_place($bdd,$idPlace)
{
		$Pl=get_place($bdd,$idPlace);
		$Places=details_place($bdd,$idPlace);

	?>
	<section>
	      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
		
		  		  <h2>Détails de la place : <?=$Pl['nomPlace']?></h2>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Client</th>
				<th>Date début</th>
				<th>Date Fin</th> 
            </tr>
        </thead>
        <tbody>
		<?php
		if (!$Places)
		{
		?>
		<td colspan="4">Pas de réservations pour cette place</td>
	<?php }
	foreach  ($Places as $Place)
	{
		?>
		<tr>
		
		<td><a href="index.php?module=clients&action=details&idClient=<?=$Place['idUser']?>">
		<?php
		
		echo $Place['nomUser']." ".$Place['prenomUser']; ?>
		</a></td>
		<td><?php 
		$date = new DateTime($Place['dateDebut']);
			echo 'Le <strong>'.$date->format('d-m-Y'.'</strong> à '.'H:i:s');
		
		?></td>
		<td><?php 
		$date = new DateTime($Place['dateFin']);
			echo 'Le <strong>'.$date->format('d-m-Y'.'</strong> à '.'H:i:s');
		if($Place['dateDebut']<= date("Y-m-d H:i:s") && $Place['dateFin']>= date("Y-m-d H:i:s"))
			echo "<span class='btn btn-info' > en cours</span>";
		?></td>		</tr>
	<?php
	}
	?>
        <tfoot>
            <tr>
                <th>Client</th>
				<th>Date début</th>
				<th>Date Fin</th> 
            </tr>
        </tfoot>
    </table>

          </div>
        </div>
      </div>
	</section>
	
	<?php
}
?>