<?php
session_start();

	if(!isset($_SESSION['username']) ){
	echo "<SCRIPT type='text/javascript'> //not showing me this
	     alert('No has iniciado sesion correctamente');
	     window.location.replace(\"home.php\");
	    </SCRIPT>";
	}
?>