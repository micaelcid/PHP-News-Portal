<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:index.php");
	}
?>
<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../CSS/styles.css">
   <link rel="stylesheet" href="../CSS/EstiloGeral.css">
   <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>
   <title>Painel de controle</title>
</head>
	
<body>
	<?php include('menu.php') ?>
	<header>
		<h1 style="text-align: center;">Bem vindo, <?php echo $_SESSION["ADM_NOME"]?></h1>
	</header>
	<main>
		
	</main>
		
	</div>
	
</body>
</html>