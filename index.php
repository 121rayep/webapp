<?php
	require "header.php";
?>
<div class="index-deco-background">
<?php
			if (isset($_SESSION["userNum"])){
				if(isset($_GET['upload'])&&$_GET['upload']=="success"){
					echo'<p class="text-success text-center bold-p">Vous avez ajouté une annonce</p>';
				}
				echo'<h1 class="text-uppercase index-deco-title">Bonjour '.$_SESSION['userId'].'!</h1>';
				echo'<h1 class="text-uppercase index-deco-title">Découvrez de nouvelles offres!</h1>';
			}
			else{
				if(isset($_GET['singup'])&&$_GET['singup']=="success"){
					echo'<p class="text-success text-center bold-p">Vous venez de vous inscrire</p>';
				}
				echo'<h1 class="text-uppercase index-deco-title">Bienvenue!</h1>';
				echo'<h1 class="text-uppercase index-deco-title">Découvrez nos dernières offres!</h1>';
			}
?>
</div>
<div class="row">
<div class="col-md-1"></div>
<main class="col-md-10 col-sm-12 col-xs-12 container-fluid index-main-container">	
	<?php
			require "includes/dbh.inc.php";
			$sql='SELECT * FROM voiture';
			$stmt=mysqli_stmt_init($cnx);
			if (!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../view.php?error=sqlerror");
			}
			else {
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				while($row = mysqli_fetch_assoc($result)){
					$sql="SELECT * FROM gallery WHERE matVoi=?";
					$stmt=mysqli_stmt_init($cnx);
					if (!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../view.php?error=sqlerror");
					}
					else{
						mysqli_stmt_bind_param($stmt,"s",$row['matVoi']);
						mysqli_stmt_execute($stmt);
						$result2=mysqli_stmt_get_result($stmt);
						if($row2 = mysqli_fetch_assoc($result2)){
							$img=$row2['nomGal'];
						}
						else{
							$img='img/no-img.jpg';
						}
						
						echo'
						<div class="index-flex-box">
							<a href="article.php?show='.$row['matVoi'].'">
								<div class="index-img-box">
									<img src="'.$img.'" alt="erreur" class="index-img">
								</div>
								<p class="text-center text-truncate font-weight-bold">'.$row['libVoi'].'</p>
							</a>  
						</div>';
					}

				}	
			}
		?>
</main>
<div class="col-md-1"></div>
</div>
<?php
	require "footer.php";

?>