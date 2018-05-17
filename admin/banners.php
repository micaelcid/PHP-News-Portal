<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
?>
<h1 class="titulo">BANNERS</h1>
<div id="barraSubMenu">
	<div id="conteudoBarraSubMenu" class="">
		<ul>
			<li><a href="add_banner.php" class="lnkBranco"><i class="fa fa-plus-square fa-fw cor2"></i>&nbsp;Novo banner</a></li>
		</ul>
	</div>
	<div class="barraProcura">
		<input type="text" id="txtFiltroBanner" placeholder="Faça a busca">
		<button type="button" id="btnProcurarBanner" class="barra-button">Procurar</button>
		<button type="button" id="btnLimparBanner" class="barra-button">Limpar</button>
	</div>
	<div class="limpa"></div>
</div>
<div id="lblQtdBanner"></div>
<div id="lblBanner"></div>
<script>
	$(function()
	{
		$("#btnProcurarBanner").click(function()
	   	{
			var filtro = $("#txtFiltroBanner").val();
			$("#lblBanner").load("load_banners.php?f="+filtro);
			$("#lblQtdBanner").html("");
		})
		$("#btnLimparBanner").click(function()
		{
			$("#txtFiltroBanner").val("");
			$("#lblBanner").html("");
			$("#lblQtdBanner").html("");
			
		})
		
	})
</script>