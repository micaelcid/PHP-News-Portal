<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	$pk_banner = $_GET["b"];
	$sqlDelete = "DELETE FROM BANNER WHERE CD_BANNER=\"$pk_banner\"";
	$result = $sqlConn->query($sqlDelete);
	unlink("../img/banner/$pk_banner.gif");
?>
<script>
	var link = "index.php";
	window.location.href = link;
</script>