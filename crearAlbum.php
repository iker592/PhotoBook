<?php
session_start();
$rol=$_SESSION["rol"];
	require_once('inc/head.inc');
	echo '<body>';	
	require_once('inc/plantilla.inc');
	require_once('inc/sessionUsername.inc');
	
?>
        <div class="form">
        	<h1>Crear Álbum</h1>
         	<form form id="crear" name='crear' enctype="multipart/form-data" method='POST' action="crearAlbum.php">
           		Título Álbum:<br/> <input type="text"  required id="titulo" name="titulo" /> <br/><br/> 
           		Añade tus primeras 3 fotos al album. Luego podrás añadir más desde la página "GestionarAlbumes"<br/>
    			<input type="file" id="foto" name="foto" onchange="return ShowImagePreview( this.files );" /><br><br>
    			<div id="previewcanvascontainer"><canvas id="previewcanvas"></canvas></div>
        		<input id="input" type="submit" value="Crear Álbum"/>
        	</form>
        </div>
	</body>
</html>
<?php
	if(isset($_POST['titulo']) ){ //&&isset($_POST['foto'])
		$rutaEnServidor='./imagenes';
		$rutaTemporal=$_FILES['foto']['tmp_name'];
		$nombreImagen=$_FILES['foto']['name'];
		$pass2=$_POST['password2'];
		$pass=$_POST['password'];
		if (empty($nombreImagen)) {
			$nombreImagen='nodisponible.png';
		}
		$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);
		
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
	//	echo "Connected successfully (".$mysqli->host_info.")";
		$tituloAlbum=$_POST['titulo']; 
		$etiqueta=$_POST['etiqueta']; 

		$nombreImagen=substr($nombreImagen, 0, -4);
		$sql="INSERT INTO foto (album,usuario,src,titulo,etiqueta) VALUES ('$tituloAlbum','iker','$rutaDestino','$nombreImagen','$etiqueta')";
	
		if (!mysqli_query($mysqli ,$sql))
		{
			die('Error: ' . mysqli_error($mysqli));
		} 
		else echo 'valores insertados';
	}
?>