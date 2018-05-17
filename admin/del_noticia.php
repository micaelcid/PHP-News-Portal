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
        <form method="post" action="">
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
				   <h1 class="titulo">DELETAR NOTÍCIA</h1>
					<div class="frmAlteraSenha">
						<p>Você realmente deseja deletar essa notícia?</p>
						<div class="fl linha">
							<?php
								$pk_noticia = $_GET["n"];
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
									WHERE  A.CD_NOTICIA=\"$pk_noticia\"
								";
								$result = $sqlConn->query($sqlSelect);
								if($result->num_rows > 0)
								{
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
												<tr>
											";
									}
									echo
									"
										</table>
										</div>
										<div class=\"fl linha espSup\">
											<p><input type=\"button\" id=\"btnExcluir\" value='Excluir'></p>
											<p><a href='#' id='voltar'>< Voltar</a></p>
											<p><div ID=\"lblMsg\"></div></p>
										</div>
									";
								}
							?>
						
						</div>
						</form>
        <div class="limpa"></div>
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
			$("#voltar").click(function(){			
				$("#conteudoCentral").load("noticias.php");
			})
			$("#btnExcluir").click(function(){			
				$("#conteudoCentral").load("really_del_noticia.php?n=<?php echo $pk_noticia?>");
				
			})
		})
	</script>	
</div>
</body>
</html>
