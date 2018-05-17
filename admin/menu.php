	<script>
	$(document).scroll(function() 
    {
		var y = $(document).scrollTop(), //get page y value 
		
			header = $("#header");
			
		if(y >= 150)  {
			header.css({position: "fixed", "top" : "0", "left":"0", "box-shadow" : "0px 0.25px 10px", "border-radius" : "0", "margin":"auto"});
			$("#hidden-logo").css({"display":"block"});
		} 
		else 
		{
        header.css({"position": "relative","box-shadow" : "none", "border-radius" : "5px 5px 0 0"});
			$("#hidden-logo").css({"display":"none"});
    	}
	});
	</script>
	<div class="pnlLogo">
		<div class="logo">
			<a href="panel.php"><img src="../img/logo.png" height="100%"></a>
		</div>
	</div>
	<header id="header">
		<div id="cssmenu" class="header">
				
				<ul>				
				   <li><a href="gerenciamento-autor.php">AUTOR</a></li>
				   <li><a href="gerenciamento-noticia.php">NOTICIA</a></li>
				   <li><a href="gerenciamento-publicidade.php">PUBLICIDADE</a></li>
				   <li><a href="logout.php" style="color:black;">SAIR</a></li>
				</ul>
				<div id="hidden-logo" class="hidden-logo">
							<a href="index.html"><img src="img/logo.png" height="100%"></a>
				</div>	
		</div>
	</header>
	
