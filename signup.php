<?php
	require "header.php";
?>

<main class="background-img-signup">
<div class="container-fluid row">
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
	<div class="col-md-4 col-sm-4 col-xs-12 container-fluid form-container">
		<h1 class="text-center signup-h1">Signup</h1>
		<?php
		if (isset($_GET["error"])){
			if ($_GET["error"]=="emptyfields"){
				echo'<p class="text-danger text-center bold-p">Veuillez remplir tous les champs!</p>';
			}
			else if ($_GET["error"]=="invalidu-idu-mail"){
				echo'<p class="text-danger text-center bold-p">Username et e-mail invalide!</p>';
			}
			else if ($_GET["error"]=="invalidu-mail"){
				echo'<p class="text-danger text-center bold-p">E-mail invalide!</p>';
			}
			else if ($_GET["error"]=="invalidu-id"){
				echo'<p class="text-danger text-center bold-p">Username invalide!</p>';
			}
			else if ($_GET["error"]=="passwordcheck"){
				echo'<p class="text-danger text-center bold-p">Password check invalide!</p>';
			}
			else if ($_GET["error"]=="usertaken"){
				echo'<p class="text-danger text-center bold-p">Username déjà pris!</p>';
			}
			else if ($_GET["error"]=="emailtaken"){
				echo'<p class="text-danger text-center bold-p">E-mail déjà pris!</p>';
			}
		}
		if (isset($_GET["signup"]) && $_GET["signup"] == "success"){
			echo'<p class="text-success text-center bold-p">Iscription avec succès!</p>';
		}
		?>
		<div class="container-fluid">
			<form name="f" action="includes/signup.inc.php" method="post">
				<div class="form-group">
					<input type="text" name="u-id" placeholder="Username" class="form-control"><br>
					<input type="email" name="u-email" placeholder="E-mail" class="form-control"><br>
					<input type="password" name="u-pw" placeholder="Password" class="form-control"><br>
					<input type="password" name="u-pw-re" placeholder="Repeat Password" class="form-control"></label><br>
					<input type="submit" name="signup-submit" value="Submit" class="btn btn-default btn-success form-control">
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
</div>
</main>


<?php
	require "footer.php";

?>