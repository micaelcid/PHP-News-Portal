<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
	$autor = $_POST["txtAutor"];
	$categoria = $_POST["txtCategoria"];
	$titulo = str_replace("&#39;","'",$_POST["txtTitulo"]);
	$linha = str_replace("&#39;","'",$_POST["txtLinha"]);
	$texto = str_replace("&#39;","'",$_POST["txtTexto"]);
	$texto = str_replace("\r","<br>",$texto);
	if(isset($_POST["txtDestaque"]))
	{
		$sqlInsert = "UPDATE noticia SET IC_DESTAQUE_NOTICIA=0 WHERE IC_DESTAQUE_NOTICIA=1";
		$sqlConn->query($sqlInsert);
		$sqlInsert = "INSERT INTO noticia(NM_TITULO_NOTICIA, NM_LINHA_FINA_NOTICIA, DS_TEXTO_NOTICIA, DT_PUBLICACAO_NOTICIA, HR_PUBLICACAO_NOTICIA, IC_DESTAQUE_NOTICIA, CD_CATEGORIA) VALUES(\"$titulo\",\"$linha\",\"$texto\",NOW(),NOW(), 1, \"$categoria\" )";
		$sqlConn->query($sqlInsert);
		
	}
	else
	{
		$sqlInsert = "INSERT INTO noticia(NM_TITULO_NOTICIA, NM_LINHA_FINA_NOTICIA, DS_TEXTO_NOTICIA, DT_PUBLICACAO_NOTICIA, HR_PUBLICACAO_NOTICIA, IC_DESTAQUE_NOTICIA, CD_CATEGORIA) VALUES(\"$titulo\",\"$linha\",\"$texto\",NOW(),NOW(), 0, \"$categoria\" )";
		$sqlConn->query($sqlInsert);
	}
	$sqlSelect = "SELECT CD_NOTICIA FROM NOTICIA ORDER BY CD_NOTICIA DESC LIMIT 0,1";
	$result = $sqlConn->query($sqlSelect);
	if($result->num_rows > 0 )
	{
		while($row = $result->fetch_assoc())
		{
			$pk_noticia = $row["CD_NOTICIA"];
			$sqlInsert = "INSERT INTO autor_noticia(CD_NOTICIA, CD_AUTOR) VALUES(\"$pk_noticia\",\"$autor\")";
			$sqlConn->query($sqlInsert);
			  if(isset($_FILES['imgUpload']))
			   {
				  $ext = strtolower(substr($_FILES['imgUpload']['name'],-4)); //Pegando extensão do arquivo
				  $new_name = $pk_noticia . $ext; //Definindo um novo nome para o arquivo
				  $dir = '../img/noticias/'; //Diretório para uploads

				  move_uploaded_file($_FILES['imgUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
			   }
			header("location:index.php");
		}
	}
	
?>