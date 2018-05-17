	<div class="linhaAzul"></div>
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
			<a href="index.php"><img src="img/logo.png" height="100%"></a>
		</div>
	</div>
	<header id="header">
		<div id="cssmenu" class="header">			
				<ul>
				<?php
					include("connection.php");

					$sqlSelect = "SELECT CD_CATEGORIA, NM_CATEGORIA FROM categoria";
					$result = $sqlConn->query($sqlSelect);
					if($result->num_rows > 0)
					{
						while ($row=$result->fetch_assoc())
						{
							$pkcate=$row["CD_CATEGORIA"];
							$nmcate=$row["NM_CATEGORIA"];
							echo "<li><a href='categoria.php?c=$pkcate'>$nmcate</a></li>";
						}
					}
				?>			   
				</ul>
				<div id="hidden-logo" class="hidden-logo">
							<a href="index.php"><img src="img/logo.png" height="100%"></a>
				</div>	
		</div>
	</header>