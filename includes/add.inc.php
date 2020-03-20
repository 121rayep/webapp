<?php

if (isset($_POST["add-submit"])){
	require "dbh.inc.php";
	$lib=$_POST["vlib"];
	$mat=$_POST["vmat"];
	$prix=$_POST["vprix"];
	$km=$_POST["vkm"];
	$an=$_POST["van"];
	$loc=$_POST["vloc"];
	$desc=$_POST["vdesc"];
	session_start();

	if(empty($lib)||empty($mat)||empty($prix)||empty($km)||empty($an)||empty($loc)||empty($desc)){
		header("Location: ../add.php?error=emptyfields");
		exit();
	}
	else {
		$sql="SELECT matVoi from voiture where matVoi=?";
		$stmt=mysqli_stmt_init($cnx);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../add.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$mat);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck=mysqli_stmt_num_rows($stmt);
			if($resultCheck>0){
				header("Location: ../add.php?error=matexsit");
				exit();
			}
			else{
				$sql="INSERT INTO voiture VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt=mysqli_stmt_init($cnx);
				if (!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../add.php?error=sqlerror");
					exit();
				}
				else {
					$hashedPw=password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"ssssssss",$mat,$lib,$prix,$km,$an,$loc,$desc,$_SESSION["userNum"]);
					mysqli_stmt_execute($stmt);
					$_SESSION['voiMat']=$mat;
					header("Location: ../upload.php?add=success");
					exit();
				}
			}
		}
	}
}
else {
	header("Location: ../index.php");
	exit();
}
?>