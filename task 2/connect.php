<?php
	$mysqli=new mysqli("localhost","root","","task2"); 
	if ($mysqli->connect_errno) {
		printf("Не вдалось підєднатись: %s\n", $mysqli->connect_error);
		exit();
	}
	$mysqli->query("SET NAMES utf8");
?>