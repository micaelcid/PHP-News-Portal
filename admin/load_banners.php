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
		SELECT CD_BANNER
		,NM_EMPRESA_ANUNCIANTE_BANNER
		,IC_ATIVO_BANNER
		,date_format(DT_PUBLICACAO_BANNER, '%d/%m/%Y')
		,date_format(HR_PUBLICACAO_BANNER, '%H:%i' )
		,NM_LINK_BANNER FROM BANNER
		WHERE NM_EMPRESA_ANUNCIANTE_BANNER LIKE '%$filtro%'
		ORDER BY CD_BANNER DESC
	";
	$result = $sqlConn->query($sqlSelect);
	if($result->num_rows > 0)
	{
		$i = 0;
		echo 
		"
		<table>
			<tr>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Empresa</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Ativo</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Data</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Hora</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Link</td>
				<td style='font-size:16px;font-weight:bold;color:#054F77'>Caminho</td>
			</tr>
		";
		while($row = $result->fetch_assoc())
		{
			$pk_banner = $row["CD_BANNER"];
			$empresa = $row["NM_EMPRESA_ANUNCIANTE_BANNER"];
			$link = $row["NM_LINK_BANNER"];
			$data = $row["date_format(DT_PUBLICACAO_BANNER, '%d/%m/%Y')"];
			$hora = $row["date_format(HR_PUBLICACAO_BANNER, '%H:%i' )"];
			$ativo = $row["IC_ATIVO_BANNER"];
			$i++;
			if($i % 2 != 0)
			{
				echo
				"
					<tr>
						<td style='background-color:#e9ebee;'>$empresa</td>
						<td style='background-color:#e9ebee;'>$ativo</td>
						<td style='background-color:#e9ebee;'>$data</td>
						<td style='background-color:#e9ebee;'>$hora</td>
						<td style='background-color:#e9ebee;'>$link</td>
						<td style='background-color:#e9ebee;'>img/banner/$pk_banner.gif</td>
						<td style='background-color:#e9ebee;'><a href='alt_banner.php?b=$pk_banner'><img src='images/edit.png'></a></td>
						<td style='background-color:#e9ebee;'><a href='del_banner.php?b=$pk_banner'><img src='images/delete.png'></a></td>
					<tr>
				";
			}
			else
			{
				echo
				"
					<tr>
						<td>$empresa</td>
						<td>$ativo</td>
						<td>$data</td>
						<td>$hora</td>
						<td>$link</td>
						<td>img/banner/$pk_banner.gif</td>
						<td><a href='alt_banner.php?b=$pk_banner'><img src='images/edit.png'></a></td>
						<td><a href='del_banner.php?b=$pk_banner'><img src='images/delete.png'></a></td>
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
					$(#lblQtdBanner).html('Foram encontrados $i banners');	
				})
			</script>
		";
	}
?>