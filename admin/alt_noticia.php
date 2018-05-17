<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
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
                <h1 class="titulo">Alterar notícia</h1>
				<div class="frmAlteraSenha">
					<p>Preencha os dados a seguir:</p>
					<form method="post" action="really_alt_noticia.php?n=<?php echo $_GET["n"]?>" enctype='multipart/form-data'>
						<div class="fl linha">
							<p>Autor:</p>
							<p><select name="txtAutor" class="caixa" required autofocus>
								<?php 
									include("connection.php");
									$pk_noticia = $_GET["n"];
									$sqlSelect = 
									"
										 SELECT
										 A.CD_AUTOR
										,B.NM_AUTOR
										FROM AUTOR_NOTICIA A INNER JOIN AUTOR B ON (A.CD_AUTOR = B.CD_AUTOR)
										WHERE CD_NOTICIA = $pk_noticia ORDER BY B.NM_AUTOR ASC
									";
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
									$sqlSelect = 
										"SELECT * FROM AUTOR WHERE CD_AUTOR!=$pk_noticia ORDER BY NM_AUTOR ASC";
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
								<p style="margin-top:-5px"><a id="addAutor" href='#' style="text-decoration:none;">Novo autor?</a></p>
						</div>
						<div class="fl linha">
							<p>Categoria:</p>
							<p><select name="txtCategoria" class="caixa" required autofocus>
									<?php 
									$sqlSelect = 
									" 
									SELECT
									 A.NM_TITULO_NOTICIA
									,A.NM_LINHA_FINA_NOTICIA
									,A.DS_TEXTO_NOTICIA
									,A.IC_DESTAQUE_NOTICIA
									,A.CD_CATEGORIA
									,B.NM_CATEGORIA
									FROM NOTICIA A INNER JOIN CATEGORIA B ON (A.CD_CATEGORIA = B.CD_CATEGORIA) WHERE A.CD_NOTICIA=$pk_noticia
									";
									$result = $sqlConn->query($sqlSelect);
									if($result->num_rows > 0)
									{
										while($row = $result->fetch_assoc())
										{
											$titulo = $row["NM_TITULO_NOTICIA"];
											$linha = $row["NM_LINHA_FINA_NOTICIA"];
											$texto = $row["DS_TEXTO_NOTICIA"];
											$destaque = $row["IC_DESTAQUE_NOTICIA"];
											$value = $row["CD_CATEGORIA"];
											$text = $row["NM_CATEGORIA"];
											echo 
											"
												<option value='$value'>$text</option>
												
											";
											$sqlSelect = 
											" 
											SELECT
											A.CD_CATEGORIA
											,B.NM_CATEGORIA
											FROM NOTICIA A INNER JOIN CATEGORIA B ON (A.CD_CATEGORIA = B.CD_CATEGORIA) WHERE A.CD_CATEGORIA!=$value ORDER BY B.NM_CATEGORIA ASC
											";
											$result = $sqlConn->query($sqlSelect);
											if($result->num_rows > 0)
											{
												while($row = $result->fetch_assoc())
												{
													$value = $row["CD_CATEGORIA"];
													$text = $row["NM_CATEGORIA"];
													echo 
													"
														<option value='$value'>$text</option>
													";

												}

											}
											echo
											"
												</select></p>
												</div>
												<div class='fl linha'>
													<p>Título: </p>
													<p><textarea name='txtTitulo' id='txtTitulo' class='caixa' rows='2' maxlength='80' required autofocus>$titulo</textarea></p>
												</div>
												<div class='fl linha'>
													<p>Linha fina: </p>
													<p><textarea name='txtLinha' id='txtLinha' class='caixa' rows='3' maxlength='150' required autofocus>$linha</textarea></p>
												</div>
												<div class='fl linha'>
													<p>Texto: </p>
													<p><textarea name='txtTexto' id='txtTexto' class='caixa' rows='2' maxlength='80' required autofocus>$texto</textarea></p>
												</div>
												<div class='fl linha'>
													<p>Imagem:</p>
													<p><input type='file' id='imgUpload' name='imgUpload'></p>
												</div>
											";
											if($destaque == 1)
											{
												echo
												"
													<div class=\"fl linha\">
														<p>Destacar notícia:</p>
														<p><input type=\"checkbox\" id=\"txtDestaque\" checked name=\"txtDestaque\">Sim</p>
													</div>
													<div class=\"fl linha espSup\">
														<input type=\"submit\" class=\"barra-button\" id=\"btnAdicionar\" value=\"Adicionar\">
														<p id=\"lblMsg\"></p>
													</div>
												";
											}
											else
											{
												echo
												"
													<div class=\"fl linha\">
														<p>Destacar notícia:</p>
														<p><input type=\"checkbox\" id=\"txtDestaque\" name=\"txtDestaque\">Sim</p>
													</div>
													<div class=\"fl linha espSup\">
														<input type=\"submit\" class=\"barra-button\" id=\"btnAdicionar\" value=\"Adicionar\">
														<p id=\"lblMsg\"></p>
													</div>
												";
											}
											
										
										}
										
									}
								?>	
						
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
</div>
</body>
</html>