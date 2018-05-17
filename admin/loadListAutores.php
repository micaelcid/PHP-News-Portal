<?php
	include('connection.php');
	$sqlSelect = "SELECT * FROM AUTOR";
	$result = mysqli_query($sqlConn, $sqlSelect);
	if(mysqli_num_rows($result) > 1)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row["CD_AUTOR"];
			$nome = $row["NM_AUTOR"];
			echo "<div class='autor'>";
			echo "<p class='autorNome fl'>$nome</p>";
			echo "<p class='autorOp fl'>?</p>";
			echo "<div class='cls'></div></div>";
		}
	}

?>