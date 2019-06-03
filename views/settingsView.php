<header class="masthead2 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
			  Paramètrage
            </h1>
            <hr>
          </div>
          
        </div>
      </div>
    </header>
<?php
function afficher_settings($Settings)
{
	?>
	<section>
	      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
		  <div style="float: right;padding:12px 30px 14px"><a href="index.php?module=settings&action=form_add" class="btn btn-b btn-sm smooth"><i class="fa fa-plus"></i> Ajouter une setting</a></div>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
				<th>Valeur</th>
                <th colspan="2">Opérations</th>
            </tr>
        </thead>
        <tbody>
		<?php
	foreach  ($Settings as $Setting)
	{
		?>
		<tr>
		<td><?= $Setting['cleSetting'];?></td>
		<td><?= $Setting['valeurSetting'];?></td>
		<td><a href="index.php?module=settings&action=form_update&idSetting=<?=$Setting['idSetting']?>"><i class="fa fa-edit"></i></a></td>
		<td><a href="index.php?module=settings&action=delete&idSetting=<?=$Setting['idSetting']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée'));"><i class="fa fa-trash-alt"></i></a></td>
		</tr>
	<?php
	}
	?>
        <tfoot>
            <tr>
                <th>Nom</th>
				<th>Valeur</th>
                <th colspan="2">Opérations</th>
            </tr>
        </tfoot>
    </table>

          </div>
        </div>
      </div>
	<section>
	
	<?php
} 
function form_add_setting()
{
	?>
	<section>
      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto">
		  <h2>Ajouter une setting</h2>
	<form>
  <div class="form-group">
    <label for="nomUser">Nom</label>
    <input type="text" class="form-control"  settingholder="Nom de la setting" name="nomSetting">
  </div>
 <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter" />
	 <input type="hidden" name="module" value="settings" />
	<input type="hidden" name="action" value="add" />
</form>
</div>
</div>
</div>
	</section>
	<?php
}

function form_update_setting($bdd,$idSetting)
{
	$Setting=get_setting($bdd,$idSetting);
	?>
<section>    
	<div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto">
		  		  <h2>Modifier une setting : <?=$Setting['nomSetting']?></h2>

	<form>
  <div class="form-group">
    <label for="nomUser">Nom</label>
    <input type="text" class="form-control"  settingholder="Nom de la setting" name="nomSetting" value="<?= $Setting['nomSetting']; ?>" />
  </div>
 <input type="submit" class="btn btn-primary" name="ajouter" value="Modifier" />
	 <input type="hidden" name="module" value="settings" />
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="idSetting" value="<?= $idSetting; ?>" />
</form>
</div>
</div>
</div>
</section>
	<?php
}
function form_details_setting($bdd,$idSetting)
{
		$Pl=get_setting($bdd,$idSetting);
		$Settings=details_setting($bdd,$idSetting);

	?>
	<section>
	      <div class="container">
	  
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
		
		  		  <h2>Détails de la setting : <?=$Pl['nomSetting']?></h2>
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
		if (!$Settings)
		{
		?>
		<td colspan="4">Pas de réservations pour cette setting</td>
	<?php }
	foreach  ($Settings as $Setting)
	{
		?>
		<tr>
		
		<td><a href="index.php?module=clients&action=details&idClient=<?=$Setting['idUser']?>">
		<?php
		
		echo $Setting['nomUser']." ".$Setting['prenomUser']; ?>
		</a></td>
		<td><?php 
		$date = new DateTime($Setting['dateDebut']);
			echo 'Le <strong>'.$date->format('d-m-Y'.'</strong> à '.'H:i:s');
		
		?></td>
		<td><?php 
		$date = new DateTime($Setting['dateFin']);
			echo 'Le <strong>'.$date->format('d-m-Y'.'</strong> à '.'H:i:s');
		if($Setting['dateDebut']<= date("Y-m-d H:i:s") && $Setting['dateFin']>= date("Y-m-d H:i:s"))
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