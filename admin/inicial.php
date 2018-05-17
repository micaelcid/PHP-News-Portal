<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		header("location:login.php");
	}
?>
<h1 class="titulo">Recursos</h1>
<p>Este sistema permite:</p>
<ul>
	<li>Alteração de Senha;</li>
	<li>Gerenciamento de notícias;</li>
	<li>Gerenciamento de Banner Promocional</li>
</ul>