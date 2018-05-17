<?php
	$server = "localhost";
	$user = "root";
	$senha = "root";
	$db = "db_senso";

	$sqlConn = mysqli_connect($server, $user, $senha, $db);	
	if ($sqlConn->connect_error) 
	{
    die("Connection failed: " . $sqlConn->connect_error);
	} 
?>