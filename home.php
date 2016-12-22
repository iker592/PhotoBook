<?php
/*
+---------------------------+
| @@hostname                |
+---------------------------+
| iker592-photobook-4137157 |
+---------------------------+
*/
session_start();
$rol=$_SESSION["rol"];
	require_once('inc/head.inc');
	echo '<body onLoad="albumesRandom()">';
	require_once('inc/plantilla.inc');
	
    
?>
		<h1>Albumes más populares</h1>
		<div id="videos">
			<div class="box2" id="0">
			</div>
			<div class="box2" id="1">
			</div>
			<div class="box2" id="2">
			</div>
			<div class="box2" id="3">
			</div>
			<div class="box2" id="4">
			</div>
			<div class="box2" id="5">
			</div>
		</div>
	</body>
</html>