<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	$autor = $_POST["txtAutor"];
	$sqlInsert = "INSERT INTO AUTOR(NM_AUTOR) VALUES(\"$autor\")";
	$sqlConn->query($sqlInsert);
	header("location:index.php");
?>