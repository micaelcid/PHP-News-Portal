<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
	include("connection.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Senso - Admin</title>
    <link rel="stylesheet" type="text/css" href="css/estiloGeral.css">
    <link rel="stylesheet" type="text/css" href="css/admin-estilo.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <link href="css/estiloAlterarSenha.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
<div>
	<div id="barraIdentificacao">
            <div id="logo"></div>
            <div id="conteudoId">
                Olá, <?php echo $_SESSION["ADM_NOME"];?></b>
                <span class="cor2 negrito">|</span>
                <a href="alterarSenha.aspx" class="lnkBrancoSimples">Alterar Senha</a>
                <span class="cor2 negrito">|</span>
                <a href="logout.php" class="lnkBrancoSimples">Sair</a>
            </div>
	</div>
        <form method="post" action="really_add_autor.php" enctype='multipart/form-data'>
        <div id="barraMenu">
            <div id="conteudoBarraMenu">
                <ul>
                    <li><a id="lnkHome" class="lnkBranco" href="#" ><i class='fa fa-home fa-fw cor1'></i>&nbsp;Home</a></li>
                    <li><a id="lnkNoticias" class="lnkBranco" href="#"><i class='fa fa-newspaper-o  fa-fw cor1'></i>&nbsp;Notícias</a></li>                       
                    <li><a id="lnkBanners" class="lnkBranco" href="#"><i class='fa fa-tasks fa-fw cor1'></i>&nbsp;Publicidade</a></li>
                </ul>
            </div>
        </div>
        <div id="areaCentral">
        <div id="conteudoCentral" class="">   
			<h1 class="titulo">Adicionar autor</h1>
			<div class="frmAlteraSenha">
				<p>Preencha o dado a seguir:</p>
					<div class="fl linha">
						<p>Autor:</p>
						<p><input type="text" name="txtAutor" class="caixa"></p>
					</div>
					<div class="fl linha espSup">
						<input type="submit" class="barra-button" id="btnAdicionar" value="Adicionar">
						<p id="lblMsg"></p>
					</div>
					<div class="limpa"></div>
				</form>
			</div>
			</div>
			</div>
<script>
		$(function(){
			$("#lnkHome").click(function(){			
				$("#conteudoCentral").load("inicial.php") ;
			})
			$("#lnkNoticias").click(function(){				
				$("#conteudoCentral").load("noticias.php") ;
			})
			$("#lnkBanners").click(function(){			
				$("#conteudoCentral").load("banners.php");
			})
		})
	</script>	
</body>
</html>