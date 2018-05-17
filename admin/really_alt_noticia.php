<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	
	$pk_noticia = $_GET["n"];
	$autor = $_POST["txtAutor"];
	$categoria = $_POST["txtCategoria"];
	$titulo = str_replace("&#39;","'",$_POST["txtTitulo"]);
	$linha = str_replace("&#39;","'",$_POST["txtLinha"]);
	$texto = str_replace("&#39;","'",$_POST["txtTexto"]);
	$texto = str_replace("\r","<br>",$texto);
	if(isset($_POST["txtDestaque"]))
	{
		$sqlInsert = "UPDATE noticia SET IC_DESTAQUE_NOTICIA=0, CD_CATEGORIA=$categoria WHERE IC_DESTAQUE_NOTICIA=1";
		$sqlConn->query($sqlInsert);
		$sqlInsert = "UPDATE noticia SET NM_TITULO_NOTICIA=\"$titulo\", NM_LINHA_FINA_NOTICIA=\"$linha\", DS_TEXTO_NOTICIA=\"$texto\", DT_PUBLICACAO_NOTICIA=NOW(), HR_PUBLICACAO_NOTICIA=NOW(), IC_DESTAQUE_NOTICIA=1, CD_CATEGORIA=$categoria WHERE CD_NOTICIA=$pk_noticia";
		$sqlConn->query($sqlInsert);	
	}
	else
	{
		$sqlInsert = "UPDATE noticia SET NM_TITULO_NOTICIA=\"$titulo\", NM_LINHA_FINA_NOTICIA=\"$linha\", DS_TEXTO_NOTICIA=\"$texto\", DT_PUBLICACAO_NOTICIA=NOW(), HR_PUBLICACAO_NOTICIA=NOW(), IC_DESTAQUE_NOTICIA=0, CD_CATEGORIA=$categoria WHERE CD_NOTICIA=$pk_noticia";
		$sqlConn->query($sqlInsert);
	}
	
	$sqlInsert = "UPDATE autor_noticia SET CD_AUTOR=\"$autor\" WHERE CD_NOTICIA=\"$pk_noticia\"";
	$sqlConn->query($sqlInsert);
	
	if(!isset($_POST["imgUpload"]))
	{
		$tmp_arquivo = $_FILES["imgUpload"]["tmp_name"];
	$tamanho = $_FILES["imgUpload"]["size"];
		move_uploaded_file("$tmp_arquivo","../img/noticias/$pk_noticia.jpg");
	}
	header("location:index.php");
		
	
?>