<?php
	require_once('inc/head.inc');
	echo '<body>';	
	require_once('inc/plantilla.inc');
?>

<h1> Album: <?php echo $_POST['tituloAlbum']; ?></h1>

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
	session_start();
	$username=$_SESSION["username"];
	
	$titulo=$_POST['tituloAlbum']; 
	$etiqueta=$_POST['etiqueta']; 
	
	if($titulo==""&& $etiqueta!="") //Buscar por etiqueta
	{
		 $fotos = mysqli_query($mysqli,"select * from foto where etiqueta='$etiqueta'"); 

	}	
	elseif ($titulo!=""&& $etiqueta=="") // buscar por titulo
	{
		 $fotos = mysqli_query($mysqli,"select * from foto where album='$titulo'"); 
	}	
	
	$cont= mysqli_num_rows($fotos); 
		if($cont>=1){
			//echo '<button id="boton2" style="height:50px;width:100px" onclick="showForm()">Atrás</button></br>';
            echo '<table border=1> <tr> <th> Usuario </th> <th> Etiqueta </th> <th> Imagen (Click para ver en tamaño original)</th></tr>';
            while ($row = mysqli_fetch_array( $fotos )) {
                $src=$row['src'];
                if($row['visibilidad']== "accesoLimitado" && $username!="")
                {	
                        echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFoto.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
               }elseif(($row['visibilidad']== "privada") && ($username==$row['usuario'] || $_SESSION["rol"]=="admin" )){
                    echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFotito.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
                }elseif($row['visibilidad']== "publica"){
                    $onclick="onclick=\"loadFoto(".$src.")";
                    echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFoto.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
               }
            }
            echo '</table>';

            $fotos->close(); //poner notacion no OO
            mysqli_close($mysqli);
	    }elseif($cont==0) echo 'No se han encontrado Álbumes con ese título';
?>

	</body>
</html>