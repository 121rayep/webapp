<?php
if (isset($_POST["signup-submit"]))
{

	require "dbh.inc.php";

	$username = $_POST["u-id"];
	$email = $_POST["u-email"];
	$password = $_POST["u-pw"];
	$rpassword = $_POST["u-pw-re"];
	
	if(empty($username) || empty($password) || empty($rpassword) || empty($email)){
		header("Location: ../signup.php?error=emptyfields&u-id=".$username."&u-email=".$email);
		
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
		header("Location: ../signup.php?error=invalidu-idu-mail");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidu-mail&u-id=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
		header("Location: ../signup.php?error=invalidu-id&u-email=".$email);
		exit();
	}
	elseif ($password !== $rpassword){
		header("Location: ../signup.php?error=passwordcheck&u-id=".$username."&u-email=".$email);
		exit();
	}
	else {
		$sql="SELECT idUser from users where idUser=?";
		$stmt=mysqli_stmt_init($cnx);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck=mysqli_stmt_num_rows($stmt);
			if($resultCheck>0){
				header("Location: ../signup.php?error=usertaken&u-email=".$email);
				exit();
			}
			else{
				$sql="SELECT idUser from users where emailUser=?";
				$stmt=mysqli_stmt_init($cnx);
				if (!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else {
					mysqli_stmt_bind_param($stmt,"s",$email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultCheck=mysqli_stmt_num_rows($stmt);
					if($resultCheck>0){
						header("Location: ../signup.php?error=emailtaken&u-id=".$username);
						exit();
					}
					else {
						$sql="INSERT INTO users (idUser, emailUser, pwUser) VALUES (?, ?, ?)";
						$stmt=mysqli_stmt_init($cnx);
						if (!mysqli_stmt_prepare($stmt,$sql)){
							header("Location: ../signup.php?error=sqlerror");
							exit();
						}
						else {
							$hashedPw=password_hash($password, PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPw);
							mysqli_stmt_execute($stmt);
							header("Location: ../index.php?singup=success");
							exit();
						}
					}
				}	
			}
		}
	}

mysqli_stmt_close($stmt);
mysqli_close($cnx);
}
else{
	header("Location: ../signup.php");
	exit();
}
?>