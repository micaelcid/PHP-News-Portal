<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/EstiloGeral.css">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="font/Roboto/Roboto-Regular.ttf" rel="stylesheet">
    <link href="font/Didact_Gothic/DidactGothic-Regular.ttf" rel="stylesheet">
    <meta name="authoring-tool" content="Adobe_Animate_CC"> 
    <script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
    <script src="js/script.js"></script>
    <title>Senso Incomum</title>
</head>
<body onload="init();" style="margin:0px;">
	<?php include("menu.php"); ?>
	<div class="main">
		
		
			<div class="mainContent fl">
				<div class="pnlContent">
					<div class="pnlDestaque"> 
						<p class="categoryTitle"><strong >RECENTES</strong></p>
						<hr>
						<?php
							$pkcate=$_GET["c"];
							$sqlSelect = "SELECT A.CD_NOTICIA
							,A.NM_TITULO_NOTICIA
							,A.NM_LINHA_FINA_NOTICIA
							,B.NM_CATEGORIA 
							FROM NOTICIA A INNER JOIN CATEGORIA B ON (A.CD_CATEGORIA = B.CD_CATEGORIA) 
							WHERE A.CD_CATEGORIA= $pkcate ORDER BY A.DT_PUBLICACAO_NOTICIA DESC, A.HR_PUBLICACAO_NOTICIA DESC LIMIT 0,1";
							$result = $sqlConn->query($sqlSelect);
							if($result->num_rows > 0)
							{
								while ($recent=$result->fetch_assoc())
								{
									$pknoticia=$recent["CD_NOTICIA"];
									$nmtnoticia=$recent["NM_TITULO_NOTICIA"];
									$nmlfnoticia=$recent["NM_LINHA_FINA_NOTICIA"];
									$categoria=$recent["NM_CATEGORIA"];
									echo"<div class='categoria'>
									<a href='categoria.php?c=$pkcate'><h1>$categoria</h1></a>
									</div>
									<div class='tituloNoticia'>
									<h2><a href='noticia.php?n=$pknoticia'>
									$nmtnoticia
									</a></h2>
									</div>
									<div class='linhaNoticia'>
									<a href='noticia.php?n=$pknoticia'><h4>$nmlfnoticia</h4></a>
									</div>
									<div class='imgRecente'>
									<a href='noticia.php?n=$pknoticia'><img src='img/noticias/$pknoticia.jpg' width='100%'></a>
									</div>";
								}
							}
						?>
					</div>
					<div class="pnlArtigos">
						<p class="categoryTitle" style="text-align:right;">
							<strong >SAIBA AGORA</strong>							
						</p>
						<hr>
						<?php
							$i = 0;
							$sqlSelect = "SELECT  A.CD_NOTICIA
							,A.NM_TITULO_NOTICIA
							,A.NM_LINHA_FINA_NOTICIA
							,B.NM_CATEGORIA 
							FROM NOTICIA A INNER JOIN CATEGORIA B ON (A.CD_CATEGORIA = B.CD_CATEGORIA) 
							WHERE A.CD_CATEGORIA=$pkcate ORDER BY A.DT_PUBLICACAO_NOTICIA DESC, A.HR_PUBLICACAO_NOTICIA DESC LIMIT 1,6";
							$result = $sqlConn->query($sqlSelect);
							if($result->num_rows > 0)
							{
								while ($recent=$result->fetch_assoc())
								{
									$pknoticia=$recent["CD_NOTICIA"];
									$nmtnoticia=$recent["NM_TITULO_NOTICIA"];
									$nmlfnoticia=$recent["NM_LINHA_FINA_NOTICIA"];
									$categoria=$recent["NM_CATEGORIA"];
									if($i % 2 == 0)
									{
										echo
										"
											<div class='pnlArtigo fl'>
												<div class='descArtigo fl'>
													<div class='categoria'>
														<a href='categoria.php?c=$pkcate'><h1>$categoria</h1></a>
													</div>
													<div class='tituloNoticia'>
														<a href='noticia.php?n=$pknoticia'><h3>         
															$nmtnoticia
														</h3></a>
													</div>
													<div class='linhaNoticia'>
														<a href='noticia.php?n=$pknoticia'><h4>
															$nmlfnoticia
														</h4></a>
													</div>								
												</div>
												<div class='itemArtigo'>
													<a href='noticia.php?n=$pknoticia'><img src='img/noticias/$pknoticia.jpg' width='100%'></a>
												</div>
											</div>
										";
									}
									else
									{
										echo
										"
											<div class='pnlArtigo fr'>							
												<div class='descArtigo fr'>
													<div class='categoria'>
														<a href='categoria.php?c=$pkcate'><h1>$categoria</h1></a>
													</div>
													<div class='tituloNoticia'>
														<a href='noticia.php?n=$pknoticia'><h3>         
															$nmtnoticia
														</h3></a>
													</div>
													<div class='linhaNoticia'>
														<a href='noticia.php?n=$pknoticia'><h4>
															$nmlfnoticia
														</h4></a>
													</div>								
												</div>
												<div class='itemArtigo fr'>
													<a href='noticia.php?n=$pknoticia'><img src='img/noticias/$pknoticia.jpg' width='100%'></a>
												</div>
											</div>
										";
									}
									$i++;
								}
							}						
						?>
						<div class="cls"></div>
					</div>		
					<div class="cls"></div>
				</div>
			</div>
		<div class="mainAside fl">
			<div class="pnlContent">
				<p class="categoryTitle"><strong >PUBLICIDADE</strong></p>
				<hr>
				<div class="banner">
					<?php
					 include("banner.php");
					?>
				</div>				
			</div>
		</div>
		<div class="cls"></div>
	</div>
	<div class="linhaAzul"></div>
</body>
</html>
