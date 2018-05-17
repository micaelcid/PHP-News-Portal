<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbName ="db_senso";
 $sqlConn = new mysqli($servername,$username,$password,$dbName);	
	
	if ($sqlConn ->connect_error) 
	{ 
	    die("Connection failed: " . $sqlConn ->connect_error); 
	}
?>


