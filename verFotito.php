<?php
	session_start();
	$rol=$_SESSION["rol"];
	require_once('inc/headSlide.inc');
	echo '<body>';
	require_once('inc/plantilla.inc');
	require_once('inc/sessionUsername.inc');
	$src=$_GET['id'];
	
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
	$fotos = mysqli_query($mysqli,"select * from foto where src='$src'"); 
	$cont= mysqli_num_rows($fotos); 
	if($cont>=1){ //https://photobook-iker592.c9users.io/verFoto.php?id=./imagenes/1feebf280340578aa572936eb14e41ea.jpg
		$row = mysqli_fetch_array( $fotos );
		
		if($_SESSION['username']!=$row['usuario']){
				require_once('inc/sessionAdmin.inc');
		}

	    $album=$row['album'];
		$etiqueta=$row['etiqueta'];
		echo '<div id="myDiv">';
		echo' <h1 id="etiq">Etiqueta: '.$row['etiqueta'].'</h1>';
		echo' <h1 id="visi">Visibilidad: '.$row['visibilidad'].'</h1>';
	}
        mysqli_close($mysqli);
?>
        Cambiar Etiqueta: <span/> <input type="text" placeholder="Etiqueta"  id="etiqueta" name="etiqueta" /> <span/> 
        <button id="buttonEtiq2" type="button" onclick="loadEtiqueta(<?php echo "'$src'"; ?>)" style="height:50px;width:80px;background:grey">Editar</button>

        Cambiar Visibilidad: <span/> <input type="text" placeholder="publica/privada/accesoLimitado"  id="visibilidad" name="visibilidad" /> <span/> 
        <button id="buttonEtiq7" type="button" onclick="loadVisibilidad(<?php echo "'$src'"; ?>)" style="height:50px;width:80px; background:grey">Editar</button></br>
       	
       	<button id="buttonEtiq5" type="button" onclick="borrarFoto(<?php echo "'$src'"; ?>)" style="height:50px;width:200px; background:red">Borrar Foto</button>
        <button id="buttonEtiq6" type="button" onclick="borrarAlbum(<?php echo "'$album'"; ?>)" style="height:50px;width:200px; background:red">Borrar Todo el Álbum</button>
<?php
?>
        <button id="buttonEtiq3" type="button" onclick="loadAlbum(<?php echo "'$album'"; ?>)" style="height:50px;width:200px">Ver todas las fotos de este Álbum</button>
        <button id="buttonEtiq4" type="button" onclick="loadAlbum2(<?php echo "'$etiqueta'"; ?>)" style="height:50px;width:200px">Ver todas las fotos con esta etiqueta</button>
<?php
        echo '<div><img src="'.$src.'" /></div>'; //CENTRAR LA FOTO Y MIRAR SI SE PUEDE AJUSTAR EL TAMAÑO

	        echo '</div>';
?>
        <script type="text/javascript">
	        function loadEtiqueta(src)
	        {
	        	var etiq=document.getElementById("etiqueta").value;
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
		        	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		        	{
		        		document.getElementById("etiq").innerHTML = xmlhttp.responseText;
		        	}
	        	}
	        	xmlhttp.open("GET","cambiarEtiqueta.php?src="+src+"&etiq="+etiq); 
	        	xmlhttp.send();
	        }
	        function loadVisibilidad(src)
	        {
	        	var visi=document.getElementById("visibilidad").value;
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
		        	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		        	{
		        		document.getElementById("visi").innerHTML = xmlhttp.responseText;
		        	}
	        	}
	        	xmlhttp.open("GET","cambiarVisibilidad.php?src="+src+"&visi="+visi); 
	        	xmlhttp.send();
	        }
	        function loadAlbum(album)
	        {
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
	        		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	        		{
	        			document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
	        		}
	        	}
	        	xmlhttp.open("GET","obtenerAlbum.php?id="+album +"&etiq="); 
	        	xmlhttp.send();
	        }
	        function loadAlbum2(etiqueta)
	        {
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
	        		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	        		{
	        			document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
	        		}
	        	}
	        	xmlhttp.open("GET","obtenerAlbum.php?id="+etiqueta+"&etiq=si"); 
	        	xmlhttp.send();
	        }
	        function borrarFoto(foto)
	        {
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
	        		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	        		{
	        			document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
	        		}
	        	}
	        	xmlhttp.open("GET","borrarFoto.php?id="+foto); 
	        	xmlhttp.send();
	        }
	        function borrarAlbum(album)
	        {
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
	        		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	        		{
	        			document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
	        		}
	        	}
	        	xmlhttp.open("GET","borrarAlbum.php?id="+album); 
	        	xmlhttp.send();
	        }

	        function showForm()
		{
			window.location.replace("buscarAlbum.php");
		}
	</script>
	</body>
</html>