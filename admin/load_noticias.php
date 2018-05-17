<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	$filtro = $_GET["f"];
	include("connection.php");
	$sqlSelect =
	"
		SELECT A.CD_NOTICIA
		,SUBSTRING(A.NM_TITULO_NOTICIA, 1, 20)
		,SUBSTRING(A.NM_LINHA_FINA_NOTICIA, 1, 40)
		,SUBSTRING(A.DS_TEXTO_NOTICIA, 1, 60)
		,date_format(A.DT_PUBLICACAO_NOTICIA, '%d/%m/%Y')
		,date_format(A.HR_PUBLICACAO_NOTICIA, '%H:%i' )
		,A.IC_DESTAQUE_NOTICIA
		,B.NM_CATEGORIA FROM NOTICIA A
		INNER JOIN CATEGORIA B ON (A.CD_CATEGORIA = B.CD_CATEGORIA)
		WHERE  A.DS_TEXTO_NOTICIA LIKE '%$filtro%'
        OR A.NM_TITULO_NOTICIA LIKE '%$filtro%'
        OR A.NM_LINHA_FINA_NOTICIA LIKE '%$filtro%'
		ORDER BY A.CD_NOTICIA DESC
	";
	$result = $sqlConn->query($sqlSelect);
	if($result->num_rows > 0)
	{
		$i = 0;
		echo 
		"
		<table>
			<tr>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Categoria</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Título</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Linha fina</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Texto</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Data</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Hora</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Destaque</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Imagem</td>
			</tr>
		";
		while($row = $result->fetch_assoc())
		{
			$pk_noticia = $row["CD_NOTICIA"];
			$categoria = $row["NM_CATEGORIA"];
			$titulo = $row["SUBSTRING(A.NM_TITULO_NOTICIA, 1, 20)"];
			$linha = $row["SUBSTRING(A.NM_LINHA_FINA_NOTICIA, 1, 40)"];
			$texto = $row["SUBSTRING(A.DS_TEXTO_NOTICIA, 1, 60)"];
			$data = $row["date_format(A.DT_PUBLICACAO_NOTICIA, '%d/%m/%Y')"];
			$hora = $row["date_format(A.HR_PUBLICACAO_NOTICIA, '%H:%i' )"];
			$destaque = $row["IC_DESTAQUE_NOTICIA"];
			$i++;
			if($i % 2 != 0)
			{
				echo
				"
					<tr>
						<td style='background-color:#e9ebee;'>$categoria</td>
						<td style='background-color:#e9ebee;'>$titulo</td>
						<td style='background-color:#e9ebee;'>$linha</td>
						<td style='background-color:#e9ebee;'>$texto</td>
						<td style='background-color:#e9ebee;'>$data</td>
						<td style='background-color:#e9ebee;'>$hora</td>
						<td style='background-color:#e9ebee;'>$destaque</td>
						<td style='background-color:#e9ebee;'>img/noticias/$pk_noticia.jpg</td>
						<td style='background-color:#e9ebee;'><a href='alt_noticia.php?n=$pk_noticia'><img src='images/edit.png'></a></td>
						<td style='background-color:#e9ebee;'><a href='del_noticia.php?n=$pk_noticia'><img src='images/delete.png'></a></td>
					<tr>
				";
			}
			else
			{
				echo
				"
					<tr>
						<td>$categoria</td>
						<td>$titulo</td>
						<td>$linha</td>
						<td>$texto</td>
						<td>$data</td>
						<td>$hora</td>
						<td>$destaque</td>
						<td>img/noticias/$pk_noticia.jpg</td>
						<td><a href='altNoticia.aspx?n=$pk_noticia'><a href='alt_noticia.php?n=$pk_noticia'><img src='images/edit.png'></a></td>
						<td><a href='altNoticia.aspx?n=$pk_noticia'><a href='del_noticia.php?n=$pk_noticia'><img src='images/delete.png'></a></td>
					<tr>
				";
			}
			
		}
		echo
		"
			</table>
			<script>
				$(function()
				{
					$(#lblQtdNoticia).html('Foram encontradas $i notícias');	
				})
			</script>
		";
	}
?>