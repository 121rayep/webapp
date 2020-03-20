<?php
if (isset($_POST["delete-submit"])){
	session_start();
	require "dbh.inc.php";
	$sql="DELETE FROM voiture WHERE matVoi=?";
	$stmt=mysqli_stmt_init($cnx);
	if (!mysqli_stmt_prepare($stmt,$sql)){
		header("Location: article.php?error=sqlerror");
	}
	else {
		$mat=$_SESSION['voiMat'];
		mysqli_stmt_bind_param($stmt,"s",$mat);
		mysqli_stmt_execute($stmt);
		unset($_SESSION['voiMat']);
		header("Location: ../view.php?delete=success");
	}
		
}
?>