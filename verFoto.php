<?php
session_start();
$rol=$_SESSION["rol"];
	require_once('inc/headSlide.inc');
	echo '<body>';
	require_once('inc/plantilla.inc');
	$src=$_GET['id'];
	
	$servername = getenv('IP');
	$username = getenv('C9_USER');
	$password = "";
	$database = "photobook";
	$dbport = 3306;
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $database, $dbport);
	 // Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	} 
	$fotos = mysqli_query($mysqli,"select * from foto where src='$src'"); 
	$cont= mysqli_num_rows($fotos); 
    if($cont>=1){
		$row = mysqli_fetch_array( $fotos );
		
		if(($row['visibilidad']=="privada"))
				require_once('inc/sessionAdmin.inc');
		
		if( ($row['visibilidad']=="accesoLimitado") && ($_SESSION["username"]=="" ))
				require_once('inc/sessionAdmin.inc');

		
	    $album=$row['album'];
	    echo '<div id=myDiv>';
	    echo'<h1>Etiqueta: '.$row['etiqueta'].'</h1>';
	 }
?>
        <button id="buttonEtiq3" type="button" onclick="loadAlbum(<?php echo "'$album'"; ?>)" style="height:50px;width:200px;background:grey">Volver al Álbum</button>
        <?php 
        	echo '<div><img src="'.$src.'" /></div>'; //CENTRAR LA FOTO Y MIRAR SI SE PUEDE AJUSTAR EL TAMAÑO
			echo '</div>'; 
		?>

        <script type="text/javascript">
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
        	function showForm()
			{
				window.location.replace("buscarAlbum.php");
			}
        </script>
	</body>
</html>