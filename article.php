<?php
	require "header.php";
	require "includes/dbh.inc.php";
?>

<div class="row">
<div class="col-md-1"></div>
<main class="col-md-10 col-sm-12 col-xs-12">
<div class="row container-fluid article-main-container">
<?php
	if (isset($_GET['show'])){
		$product=$_GET['show'];
		$sql='SELECT * FROM voiture WHERE matVoi=?';
		$stmt=mysqli_stmt_init($cnx);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: article.php?error=sqlerror");
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$_GET['show']);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				echo'
				<div class="container-fluid col-md-5">
					
					<h1>'.$row['libVoi'].'</h1>
					<div class="article-info">
						<p class="bigger-p"><i class="fa fa-usd"></i>Prix : '.$row['prixVoi'].'dt</p>
						<p class="bigger-p"><i class="fa fa-map-marker"></i>Localisation : '.$row['locVoi'].'</p>
					</div>
					<hr>
					<h2>Plus de détails :</h2>
					<div class="article-info">
						<p>Kilométrage : '.$row['kmVoi'].'</p>
						<p>Année : '.$row['anneeVoi'].'</p>
						<p>Description : '.$row['descVoi'].'</p>
					</div>
				</div>
				';
				$sql='SELECT * FROM gallery WHERE matVoi=?';
				$stmt=mysqli_stmt_init($cnx);
				if (!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: article.php?error=sqlerror");
				}
				else {
					echo'<div class="container-fluid col-md-7 article-img-container">';
					mysqli_stmt_bind_param($stmt,"s",$_GET['show']);
					mysqli_stmt_execute($stmt);
					$result2=mysqli_stmt_get_result($stmt);
					while($row2 = mysqli_fetch_assoc($result2)){
						echo'
						<div class="article-img-box">
							<img src="'.$row2['nomGal'].'" alt="image introuvable" class="article-img" style="background-size:cover;">
								
						</div>
						';
					}
					echo'</div>';
				}
			}
			else{
				header("Location: article.php?error=sqlerror");
			}
		}
		echo'</div>';
		$sql="SELECT * FROM voiture WHERE matVoi=?";
		$stmt=mysqli_stmt_init($cnx);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: article.php?error=sqlerror");
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$_GET['show']);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				if(isset($_SESSION['userNum']) && ($_SESSION['userNum']==$row['numUser'] || $_SESSION['userNum']==1)){
					$_SESSION['voiMat']=$_GET['show'];
					echo'
					<div class="row container-fluid">
						<div class="col-md-8"></div>
						<div class="col-md-4 article-supp-container">
							<form method="post" action="includes/delete.inc.php" class="form-inline">
								<button type="submit" name="delete-submit" class="btn btn-danger btn-sm">Supprimer votre annonce</button>
							</form>
						</div>
					</div>
					';
				}
			}
		}

		echo '
		<div class="article-main-container container-fluid row">
		<div class="col-md-2"></div>
		<div class="col-md-8 article-intr-container container-fluid">
		<h2 class="article-intr-title">Intéressé? Contactez moi!</h2>
		';
		if (isset($_SESSION['userNum'])){
			$sql="SELECT * FROM voiture WHERE matVoi=?";
			$stmt=mysqli_stmt_init($cnx);
			if (!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: article.php?error=sqlerror");
			}
			else {
				mysqli_stmt_bind_param($stmt,"s",$_GET['show']);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)){
					$sql="SELECT * FROM users WHERE numUser=?";
					$stmt=mysqli_stmt_init($cnx);
					if (!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: article.php?error=sqlerror");
					}
					else{
						mysqli_stmt_bind_param($stmt,"s",$row['numUser']);
						mysqli_stmt_execute($stmt);
						$result2=mysqli_stmt_get_result($stmt);
						if($row2 = mysqli_fetch_assoc($result2)){
							$_SESSION['sendMail']=$row2['emailUser'];
							$_SESSION['sendMailSubj']=$row['libVoi'];
							echo'
							<form method="post" action="includes/mail.inc.php" class="">
								<textarea name="msg" placeholder="Ecrivez un mail" class="form-control" rows="3" style="resize:none"></textarea>
								<br>
								<button type="submit" name="mail-submit" class="btn btn-outline-light btn-block form-control">Envoyer</button>
							</form>
							';
						}
					}
				}
			}

			
		}
		else{
			echo'
			<p>Veuillez vous connecter <a href="signup.php">ou vous inscrire!</a> pour me contacter</p>
			';
		}
		echo'
		</div>
		<div class="col-md-2"></div>
		</div>
		';

	}
?>

</main>
<div class="col-md-1"></div>
</div>
<?php
	require "footer.php";

?>