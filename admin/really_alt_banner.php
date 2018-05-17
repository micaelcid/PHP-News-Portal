<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	$pk_banner = $_GET["b"];
	$empresa = $_POST["txtEmpresa"];
	$link = $_POST["txtLink"];
	if(isset($_POST["txtAtivo"]))
	{
		$sqlUpdate = "UPDATE BANNER SET NM_EMPRESA_ANUNCIANTE_BANNER=\"$empresa\", IC_ATIVO_BANNER=1, DT_PUBLICACAO_BANNER=NOW(), HR_PUBLICACAO_BANNER=NOW(), NM_LINK_BANNER=\"$link\" WHERE CD_BANNER=\"$pk_banner\"";
		$sqlConn->query($sqlUpdate);
	}
	else
	{
		$sqlUpdate = "UPDATE BANNER SET NM_EMPRESA_ANUNCIANTE_BANNER=\"$empresa\", IC_ATIVO_BANNER=0, DT_PUBLICACAO_BANNER=NOW(), HR_PUBLICACAO_BANNER=NOW(), NM_LINK_BANNER=\"$link\" WHERE CD_BANNER=\"$pk_banner\"";
		$sqlConn->query($sqlUpdate);
	}
	if(isset($_FILES['imgUpload']))
	{
	  $ext = strtolower(substr($_FILES['imgUpload']['name'],-4)); //Pegando extensão do arquivo
	  $new_name = $pk_banner . $ext; //Definindo um novo nome para o arquivo
	  $dir = '../img/banner/'; //Diretório para uploads
	  move_uploaded_file($_FILES['imgUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
	}
	header("location:index.php");
	
?>