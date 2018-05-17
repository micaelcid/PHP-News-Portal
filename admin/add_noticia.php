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
        <form method="post" action="really_add_noticia.php" enctype='multipart/form-data'>
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
			<h1 class="titulo">Adicionar notícia</h1>
			<div class="frmAlteraSenha">
				<p>Preencha os dados a seguir:</p>
					<div class="fl linha">
						<p>Autor:</p>
						<p><select name="txtAutor" class="caixa" required autofocus>
							<?php 
								$sqlSelect = "SELECT * FROM AUTOR ORDER BY NM_AUTOR ASC";
								$result = $sqlConn->query($sqlSelect);
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										$value = $row["CD_AUTOR"];
										$text = $row["NM_AUTOR"];
										echo "<option value='$value'>$text</option>";
									}
								}
							?>	
							</select></p>
							<p style="margin-top:-5px"><a id="addAutor" href='add_autor.php' style="text-decoration:none;">Novo autor?</a></p>
					</div>
					<div class="fl linha">
						<p>Categoria:</p>
						<p><select name="txtCategoria" class="caixa" required autofocus>
								<?php 
								$sqlSelect = "SELECT * FROM CATEGORIA";
								$result = $sqlConn->query($sqlSelect);
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										$value = $row["CD_CATEGORIA"];
										$text = $row["NM_CATEGORIA"];
										echo "<option value='$value'>$text</option>";
									}
								}
							?>	
							</select></p>
					</div>
					<div class="fl linha">
						<p>Título: </p>
						<p><textarea name="txtTitulo" class="caixa" rows="2" maxlength="80" required autofocus></textarea></p>

					</div>
					<div class="fl linha">
						<p>Linha Fina:</p>
						<p><textarea name="txtLinha" class="caixa" rows="3" maxlength="150" required autofocus></textarea></p>
					</div>
					<div class="fl linha">
						<p>Texto: </p>
						<p><textarea name="txtTexto" class="caixa" rows="8" required autofocus></textarea></p>
					</div>

					<div class="fl linha">
						<p>Imagem:</p>
						<p><input type="file" name="imgUpload"></p>
					</div>

					<div class="fl linha">
						<p>Destacar notícia:</p>
						<p><input type="checkbox" name="txtDestaque">Sim</p>
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