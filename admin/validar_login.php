<?php
	session_start();
	include('connection.php');
	$login = $_GET["l"];
	$senha = $_GET["p"];
	$sqlSelect = "SELECT * FROM USUARIO WHERE CD_LOGIN_USUARIO=md5(\"$login\") AND NM_SENHA_USUARIO=md5(\"$senha\" ) ";
	$result = $sqlConn->query($sqlSelect);
	if($result->num_rows > 0)
	{
		setcookie("login", $login);
		setcookie("senha", $senha);
		while($row = $result->fetch_assoc())
		{
			$_SESSION["ADM_NOME"] = $row["NM_USUARIO"];				
		?>
			<script>
				var link ="index.php";
				window.location.href = link;
			</script>
		<?php
		
		}
		
	}
	else
	{
		echo "Informações de login incorretas.";
	}
	
?>