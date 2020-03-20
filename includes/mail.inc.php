<?php
if (isset($_POST["mail-submit"])){
	session_start();
	require "dbh.inc.php";
	$msg=$_POST['msg'];
	$subj=$_SESSION['sendMailSubj'];
	$email=$_SESSION['sendMail'];
	mail($email, $subj, $msg);

	unset($_SESSION['sendMail']);
	unset($_SESSION['sendMailSubj']);
	header("Location: ../view.php?mail=success");
		
}
?>