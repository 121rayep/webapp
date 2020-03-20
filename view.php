<?php
	require "header.php";
	require "includes/dbh.inc.php";

if (isset($_SESSION["userNum"])){
				echo'<div class="index-deco-background">
				<h1 class="text-uppercase index-deco-title">Vos annonces :</h1>
				</div>';
			}
			else{
				echo'<div class="index-deco-background">
				<h1 class="text-uppercase index-deco-title">Oups, vous êtes deconnecté!</h1>
				</div>';
			}
?>
<div class="row">
<div class="col-md-1"></div>
<main class="col-md-10 col-sm-12 col-xs-12 container-fluid index-main-container">	
		<?php
			if (isset($_SESSION["userNum"])){
				$sql="SELECT * from voiture where numUser=?";
				$stmt=mysqli_stmt_init($cnx);
				if (!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: view.php?error=sqlerror");
				}
				else {
					mysqli_stmt_bind_param($stmt,"s",$_SESSION["userNum"]);
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
		

			}
			else{
				echo'
				<div class="index-deco-background">
				<h1 class="text-uppercase index-deco-title">Oups!</h1>
				<h1 class="text-uppercase index-deco-title">vous êtes deconnecté!</h1>
				</div>';
			}
		?>
</main>
<div class="col-md-1"></div>
</div>
<?php
	require "footer.php";
?>