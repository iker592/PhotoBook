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
	$fotos = mysqli_query($mysqli,"select * from usuario"); 
	$cont= mysqli_num_rows($fotos); 
    echo '<button id="boton2" style="height:50px;width:100px;background:grey" onclick="showForm()">Atrás</button></br>';
    echo '<table border=1> <tr> <th> Username </th> <th> Email </th> <th> Telefono </th><th> Aceptado </th><th> Modificar </th></tr>';
            
	if($cont>=1){
        while ($row = mysqli_fetch_array( $fotos )) {
            $username=$row['username'];
            echo '<tr><td>' . $row['username'] . '</td> <td>' . $row['email'] . '</td>
            <td>' . $row['telefono'] . '</td><td>' . $row['aceptado'] . '</td><td>' . '<button id="boton3" style="height:50px;width:100px" onclick="editUser(\''.$username.'\')">Editar</button>' . '</td></tr>';
        }
	}else echo 'No hay usuarios';
    mysqli_close($mysqli);
?>