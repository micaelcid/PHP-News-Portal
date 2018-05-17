<?php
	include("connection.php");
	$sqlSelect = "SELECT CD_BANNER, NM_LINK_BANNER FROM BANNER WHERE IC_ATIVO_BANNER=1 ORDER BY DT_PUBLICACAO_BANNER DESC, HR_PUBLICACAO_BANNER DESC LIMIT 0,3";
	$result = $sqlConn->query($sqlSelect);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$pk_banner = $row["CD_BANNER"];
			$link_banner = $row["NM_LINK_BANNER"];
			echo "<a href='$link_banner' target=\"_blank\"><img src='img/banner/$pk_banner.gif'></a>";
		}
	}
?>