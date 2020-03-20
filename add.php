<?php
	require "header.php";
?>

<main class="background-img-add container-fluid row">
	<div class="col-md-3 col-sm-2 col-xs-12"></div>	
	<div class="col-md-6 col-sm-8 col-xs-12 container-fluid form-container">
		<?php
			if (isset($_SESSION["userNum"])){
				echo'<div>
				<h1 class="add-title text-center">Ajouter une annonce</h1><br>';
				if (isset($_GET["error"])){
					if ($_GET["error"]=="emptyfields"){
						echo'<p class="text-danger text-center bold-p">Veuillez remplir tous les champs!</p>';
					}
					else if ($_GET["error"]=="matexsit"){
						echo'<p class="text-danger text-center bold-p">Matricule existante!</p>';
						}
					}
				if (isset($_GET["add"]) && $_GET["add"] == "success"){
					echo'<p class="text-success text-center bold-p">Offre ajoutée avec succès!</p>';
				}
				echo'
					<form method="post" action="includes/add.inc.php">
						<div class="form-group">
						<label>Titre :</label>
						<textarea class="form-control" name="vlib" rows="1" style="resize:none"></textarea>
						</div>

						<div class="form-group">
						<label>Matricule :</label>
						<input type="text" class="form-control" name="vmat">
						</div>

						<div class="form-group">
						<label>Prix en DT:</label>
						<input type="text" class="form-control" name="vprix">
						</div>

						<div class="form-group">
						<label>Kilométrage :</label>
						<input type="text" class="form-control" name="vkm">
						</div>

						<div class="form-group">
						<label>Année :</label>
						<input type="text" class="form-control" name="van">
						</div>

						<div class="form-group">
						<label>Localisation :</label>
						<textarea class="form-control" name="vloc" rows="1" style="resize:none"></textarea>
						</div>

						<div class="form-group">
						<label>Description :</label>
						<textarea class="form-control" name="vdesc" rows="3" style="resize:none"></textarea>
						</div>

						<button type="submit" name="add-submit" class="btn btn-success form-control btn-block">Submit</button>						
					</form>
					
				</div>';
			}
			else{
				echo'<p class="text-danger text-center bold-p">Veuillez vous connecter!</p>';
			}
		?>
	</div>
	<div class="col-md-3 col-sm-2 col-xs-12"></div>
</main>
<?php
	require "footer.php";

?>