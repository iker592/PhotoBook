<?php
session_start();

	if( ($_SESSION['rol']!="admin") ){
	echo "<SCRIPT type='text/javascript'> //not showing me this
	     alert('quieto ladronzuelo! Zona restringida');
	     window.location.replace(\"home.php\");
	    </SCRIPT>";
	}
?>