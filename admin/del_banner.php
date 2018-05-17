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
				   <h1 class="titulo">DELETAR BANNER</h1>
					<div class="frmAlteraSenha">
						<p>Você realmente deseja deletar esse banner?</p>
						<div class="fl linha">
							<?php
								$pk_banner = $_GET["b"];
								include("connection.php");
								$sqlSelect =
								"
									SELECT CD_BANNER
									,NM_EMPRESA_ANUNCIANTE_BANNER
									,IC_ATIVO_BANNER
									,date_format(DT_PUBLICACAO_BANNER, '%d/%m/%Y')
									,date_format(HR_PUBLICACAO_BANNER, '%H:%i' )
									,NM_LINK_BANNER FROM BANNER
									WHERE CD_BANNER=$pk_banner
								";
								$result = $sqlConn->query($sqlSelect);
								if($result->num_rows > 0)
								{
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
											echo
											"
												<tr>
													<td style='background-color:#e9ebee;'>$empresa</td>
													<td style='background-color:#e9ebee;'>$ativo</td>
													<td style='background-color:#e9ebee;'>$data</td>
													<td style='background-color:#e9ebee;'>$hora</td>
													<td style='background-color:#e9ebee;'>$link</td>
													<td style='background-color:#e9ebee;'>img/banner/$pk_banner.gif</td>
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
				$("#conteudoCentral").load("banners.php");
			})
			$("#btnExcluir").click(function(){			
				$("#conteudoCentral").load("really_del_banner.php?b=<?php echo $pk_banner?>");
				
			})
		})
	</script>	
</div>
</body>
</html>
