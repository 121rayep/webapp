<?php
	require "header.php";
?>

<main class="background-img-add container-fluid row">
	<div class="col-md-3 col-sm-2 col-xs-12"></div>	
	<div class="col-md-6 col-sm-8 col-xs-12 container-fluid form-container">
		<?php
			if (isset($_SESSION["userNum"])){
				echo'<div>
				<h1 class="add-title text-center">Ajouter des images :</h1>';
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
					<form method="post" action="includes/upload.inc.php"  enctype="multipart/form-data">
						
						<label>Upload images :</label>
						<div class="custom-file">
							<input type="file"  class="custom-file-input" name="vfile[]" multiple="" id="inputGroupFile01"><br>
							<label class="custom-file-label" for="inputGroupFile01">Choisir des images</label>
						<br>
						</div>
						<button type="submit" name="upload-submit" class="btn btn-success form-control btn-block">Upload</button>
											
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