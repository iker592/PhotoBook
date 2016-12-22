<?php		

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
		    $src=$_GET['src'];
		    $visi=$_GET['visi'];

    		$sql="UPDATE foto SET visibilidad='$visi' WHERE src='$src'";
    		if (!mysqli_query($mysqli ,$sql)){
    			die('Error: ' . mysqli_error($mysqli));
    		}
    		echo 'Visibilidad: '. $visi;
?>