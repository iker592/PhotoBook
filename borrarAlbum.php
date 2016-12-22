<?php
	$album=$_GET['id'];
	
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
	$fotos = mysqli_query($mysqli,"select * from foto where album='$album'"); 
	$cont= mysqli_num_rows($fotos); 
	if($cont>=1){
		$row = mysqli_fetch_array( $fotos );
        $sql="DELETE FROM foto WHERE album='$album'";
    	if (!mysqli_query($mysqli ,$sql)){
    		die('Error: ' . mysqli_error($mysqli));
    	}
    	echo 'Álbum Eliminado';
	}else echo 'No existe ningún Álbum con ese titulo';
    mysqli_close($mysqli);
?>