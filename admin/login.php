<?php
	if(isset($_COOKIE["login"]))
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
    <link href="../css/admin.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="../font/Roboto/Roboto-Regular.ttf" rel="stylesheet">
    <link href="../font/Didact_Gothic/DidactGothic-Regular.ttf" rel="stylesheet">
    <meta name="authoring-tool" content="Adobe_Animate_CC">
    <script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Senso Incomum</title>
</head>
<body>
<div>
	<div class="linhaAzul"></div>
    <main>
        <div class="pnlLogo">
            <div class="logo">
                <a href="../index.php"><img src="../img/logo.png" height="100%"></a>
            </div>
        </div>
        <h2>Administrador</h2>
        <div class="ContentBox">
        <form method="post" action="">
			<input type="text" id="txtUser" placeholder="Nome do usuário" class="TextBox" required><br>
			<input type="password" id="txtPass" placeholder="Senha do usuário" class="TextBox" required><br>
			<input type="button" id="btnLogin" class="Button" value="LOGIN">
	    </form>
	    <div id="lblMensagem"></div>
        </div>
    </main>
	<script>
		$(function()
		{
			$("#btnLogin").click(function()
			{
				var user = $('#txtUser').val();
				var pass = $('#txtPass').val();
				$("#lblMensagem").load("validar_login.php?l="+user+"&p="+pass) ;
			})
			$("input").keydown(function(e)
		   	{
			if(e.keyCode == 13){
				var user = $('#txtUser').val();
				var pass = $('#txtPass').val();
				$("#lblMensagem").load("validar_login.php?l="+user+"&p="+pass) ;
			}
			})
		})
	</script>
</div>
</body>
</html>
