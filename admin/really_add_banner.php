<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	$empresa = $_POST["txtEmpresa"];
	$link = $_POST["txtLink"];
	if(isset($_POST["txtAtivo"]))
	{
		$sqlInsert = "INSERT INTO BANNER(NM_EMPRESA_ANUNCIANTE_BANNER, IC_ATIVO_BANNER, DT_PUBLICACAO_BANNER, HR_PUBLICACAO_BANNER, NM_LINK_BANNER) VALUES(\"$empresa\", 1, NOW(), NOW(), \"$link\" )";
		$sqlConn->query($sqlInsert);
	}
	else
	{
		$sqlInsert = "INSERT INTO BANNER(NM_EMPRESA_ANUNCIANTE_BANNER, IC_ATIVO_BANNER, DT_PUBLICACAO_BANNER, HR_PUBLICACAO_BANNER, NM_LINK_BANNER) VALUES(\"$empresa\", 0, NOW(), NOW(), \"$link\" )";
		$sqlConn->query($sqlInsert);
	}
	$sqlSelect = "SELECT CD_BANNER FROM BANNER ORDER BY CD_BANNER DESC LIMIT 0,1";
	$result = $sqlConn->query($sqlSelect);
	if($result->num_rows > 0 )
	{
		while($row = $result->fetch_assoc())
		{
			if(isset($_FILES['imgUpload']))
			   {
				  $ext = strtolower(substr($_FILES['imgUpload']['name'],-4)); //Pegando extensão do arquivo
				  $new_name = $row["CD_BANNER"] . $ext; //Definindo um novo nome para o arquivo
				  $dir = '../img/banner/'; //Diretório para uploads
				  move_uploaded_file($_FILES['imgUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
			   }
			header("location:index.php");
		}
	}
	
?>