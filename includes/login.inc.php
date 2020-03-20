<?php
if (isset($_POST["login-submit"])){
	require "dbh.inc.php";
	$idemail=$_POST["uid"];
	$password=$_POST["upwd"];
	if(empty($idemail)||empty($password)){
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{
		$sql="SELECT * FROM users WHERE idUser=? OR emailUser=?";
		$stmt=mysqli_stmt_init($cnx);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"ss", $idemail, $idemail);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if($row=mysqli_fetch_assoc($result)){
				$pwdCheck=password_verify($password, $row['pwUser']);
				if($pwdCheck==false){
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
				else if($pwdCheck==true){
					session_start();
					$_SESSION['userNum']=$row['numUser'];
					$_SESSION['userId']=$row['idUser'];
					header("Location: ../index.php?login=success");
					exit();
				}
				else{
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
			}
			else{
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}

}
else {
	header("Location: ../index.php");
	exit();
}
?>