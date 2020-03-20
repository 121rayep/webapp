<?php
	$cnx= mysqli_connect("localhost","root","","dbvoiture");
	if (!$cnx) {
		die("Connection failed: ".mysqli_connect_error());
	}
?>