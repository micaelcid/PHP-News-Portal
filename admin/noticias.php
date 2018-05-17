<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
?>
<h1 class="titulo">NOTÍCIAS</h1>
<div id="barraSubMenu">
	<div id="conteudoBarraSubMenu" class="">
		<ul>
			<li><a id="addNoticia" href="add_noticia.php" class="lnkBranco"><i class="fa fa-user-plus fa-fw cor2"></i>&nbsp;Nova notícia</a></li>
		</ul>
	</div>
	<div class="barraProcura">
		<input type="text" id="txtFiltroNoticia" placeholder="Faça a busca">
		<button type="button" id="btnProcurarNoticia" class="barra-button">Procurar</button>
		<button type="button" id="btnLimparNoticia" class="barra-button">Limpar</button>
	</div>
	<div class="limpa"></div>
</div>
<div id="lblQtdNoticia"></div>
<div id="lblNoticias"></div>
<script>
	$(function()
	{
		$("#btnProcurarNoticia").click(function()
	   	{
			var filtro = $("#txtFiltroNoticia").val();
			$("#lblNoticias").load("load_noticias.php?f="+filtro);
			$("#lblQtdNoticia").html("");
		})
		$("#btnLimparNoticia").click(function()
		{
			$("#txtFiltroNoticia").val("");
			$("#lblNoticias").html("");
			$("#lblQtdNoticia").html("");
			
		})
		$("#addNoticia").click(function()
		{
			$("#conteudoCentral").load("add_noticia.php");
		})
		
	})
</script>