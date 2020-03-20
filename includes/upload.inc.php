<?php
if (isset($_POST["upload-submit"])){
	session_start();
	require "dbh.inc.php";
	$mat=$_SESSION['voiMat'];
	for ($i=0;$i<count($_FILES['vfile']['name']);$i++){

		$fileName=$_FILES['vfile']['name'][$i];
		$fileTempName=$_FILES['vfile']['tmp_name'][$i];
		$fileError=$_FILES['vfile']['error'][$i];
		$fileExtA=explode(".",$fileName);
		$fileExt=strtolower(end($fileExtA));
		$allowed=array("jpg","jpeg","png");

		if (in_array($fileExt,$allowed)){
			if($fileError===0){
				$fileFullName="img-".uniqid("",true).".".$fileExt;
				$fileDest="../img/".$fileFullName;

				$sql="INSERT INTO gallery (nomGal,matVoi) VALUES (?,?)";
				$stmt=mysqli_stmt_init($cnx);
				if (!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../upload.php?error=sqlerror");
					exit();
				}
				else {
					$paramName="img/".$fileFullName;
					mysqli_stmt_bind_param($stmt,"ss",$paramName,$mat);
					mysqli_stmt_execute($stmt);
					move_uploaded_file($fileTempName, $fileDest);
				}
			}else{
				header("Location: ../upload.php?error=invalidimg");
				exit();
			}
		}
		else{
			header("Location: ../upload.php?error=invalidimg");
			exit();
		}
	}
	if(!isset($_GET['error'])){
		unset($_SESSION['voiMat']);
		header("Location: ../index.php?upload=success");
		exit();
	}
}

?>