<?php
		// A simple PHP script demonstrating how to connect to MySQL.
		// Press the 'Run' button on the top to start the web server,
		// then click the URL that is emitted to the Output tab of the console.
		 $servername = getenv('IP');
		 $username = getenv('C9_USER');
		 $password = "";
		 $database = "photobook";
		 $dbport = 3306;
		 // Create connection
		 $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
		 	//$mysqli = mysqli_connect("mysql.hostinger.es", "u410012855_root", "", "u410012855_quiz");

		 // Check connection
		if ($mysqli->connect_error) {
		    die("Connection failed: " . $mysqli->connect_error);
		} 
		$datos="";
	$username=trim($_GET['username']);
	if (isset($_POST['email'])){
	    $email=$_POST['email'];
	    //$sql="UPDATE usuario SET Email='$email', Pregunta='$preg', Respuesta='$resp', Complejidad='$comp' WHERE Numero='$id'";
	    $sql="UPDATE usuario SET email='$email' WHERE username='$username'";
		if (!mysqli_query($mysqli ,$sql)){
			die('Error: ' . mysqli_error($mysqli));
		}
		$datos+= "Email actualizado ";
	}
	if (isset($_POST['telefono'])){
	    $telefono=$_POST['telefono'];
	    //$sql="UPDATE usuario SET Email='$email', Pregunta='$preg', Respuesta='$resp', Complejidad='$comp' WHERE Numero='$id'";
	    $sql="UPDATE usuario SET telefono='$telefono' WHERE username='$username'";
		if (!mysqli_query($mysqli ,$sql)){
			die('Error: ' . mysqli_error($mysqli));
		}
		$datos+= "Telefono actualizado ";
	}
	if (isset($_POST['aceptado'])){
	    $aceptado=$_POST['aceptado'];
	    //$sql="UPDATE usuario SET Email='$email', Pregunta='$preg', Respuesta='$resp', Complejidad='$comp' WHERE Numero='$id'";
	    $sql="UPDATE usuario SET aceptado='$aceptado' WHERE username='$username'";
		if (!mysqli_query($mysqli ,$sql)){
			die('Error: ' . mysqli_error($mysqli));
		}
		$datos+= "Admision actualizada ";
	}
	if (isset($_POST['username'])){
	    $usernamePOST=$_POST['username'];
	    //$sql="UPDATE usuario SET Email='$email', Pregunta='$preg', Respuesta='$resp', Complejidad='$comp' WHERE Numero='$id'";
	    $sql="UPDATE usuario SET username='$usernamePOST' WHERE username='$username'";
		if (!mysqli_query($mysqli ,$sql)){
			die('Error: ' . mysqli_error($mysqli));
		}
		$datos+= "Username actualizada";
	}
	echo "<SCRIPT type='text/javascript'> //not showing me this
	     alert('Datos Modificados');
	     window.location.replace(\"home.php\");
	    </SCRIPT>";
?>
