<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	$pk_noticia = $_GET["n"];
	$sqlDelete = "DELETE FROM AUTOR_NOTICIA WHERE CD_NOTICIA=\"$pk_noticia\"";
	$result = $sqlConn->query($sqlDelete);
	$sqlDelete = "DELETE FROM NOTICIA WHERE CD_NOTICIA=\"$pk_noticia\"";
	$result = $sqlConn->query($sqlDelete);
	unlink("../img/noticias/$pk_noticia.jpg");
?>
<script>
	var link = "index.php";
	window.location.href = link;
</script>