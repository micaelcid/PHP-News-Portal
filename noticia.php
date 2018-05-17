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
					<?php  		
						$pk_noticia = $_GET["n"];
						$sqlSelect = "SELECT      A.CD_NOTICIA
						,A.NM_TITULO_NOTICIA
						,A.NM_LINHA_FINA_NOTICIA
						,A.DS_TEXTO_NOTICIA
						,A.DT_PUBLICACAO_NOTICIA
						,A.HR_PUBLICACAO_NOTICIA
						,B.CD_CATEGORIA
						,B.NM_CATEGORIA
						,D.NM_AUTOR
						FROM NOTICIA A
						INNER JOIN CATEGORIA B ON (A.CD_CATEGORIA = B.CD_CATEGORIA)
						INNER JOIN AUTOR_NOTICIA C ON (A.CD_NOTICIA   = C.CD_NOTICIA)
						INNER JOIN AUTOR D ON (C.CD_AUTOR   = D.CD_AUTOR) WHERE A.CD_NOTICIA=$pk_noticia";
						$result = $sqlConn->query($sqlSelect);
						if($result->num_rows > 0)
						{
							while ($recent=$result->fetch_assoc())
							{
							$pk_categoria=$recent["CD_CATEGORIA"];
							$categoria=$recent["NM_CATEGORIA"];	
							$nmtnoticia=$recent["NM_TITULO_NOTICIA"];
							$nmlfnoticia=$recent["NM_LINHA_FINA_NOTICIA"];
							$autor = $recent["NM_AUTOR"];
							$oldDate = date_create($recent["DT_PUBLICACAO_NOTICIA"]);
							$newDate = date_format($oldDate, "d/m/Y");
							$oldTime = date_create($recent["HR_PUBLICACAO_NOTICIA"]);
							$newTime = date_format($oldTime, "H:i");
							$texto = $recent["DS_TEXTO_NOTICIA"];
							echo"<p class='categoryTitle'><strong><a href='categoria.php?c=$pk_categoria'>$categoria</a></strong></p>
							<hr>
							<h5>$nmtnoticia</h5>
							<h6>$nmlfnoticia</h6>
							<h4><strong>$autor<strong></h4>
							<h4>$newDate | $newTime </h4>
							<div class='imgNoticia'><img src='img/noticias/$pk_noticia.jpg' width='100%'></div>
							<h6>$texto</h6>
							";
							}
						}
						?>
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
<html>
