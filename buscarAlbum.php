<?php
session_start();
$rol=$_SESSION["rol"];
	require_once('inc/headSlide.inc');
	echo '<body>';
	require_once('inc/plantilla.inc');
?>
 		<div class="form" id="form">
 			<h1>Buscar Álbum</h1>
 			<form id="buscar" action="" method="post">
   				Titulo del Álbum:<br/> <input type="text" placeholder="Título del Álbum"  id="tituloAlbum" name="tituloAlbum" /> <br/>      <!--      pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$" -->
   				Etiqueta:<br/> <input type="text" placeholder="Etiqueta"  id="etiqueta" name="etiqueta" /> <br/>      <!--      pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$" -->
			</form>
			<button id="boton" onclick="displayAlbum()">Buscar por Album</button><br/><br/>
			<button id="boton" onclick="displayAlbum2()">Buscar por Etiqueta</button>
		</div>
		<div class="myVideo" id="myAlbum"></div>
		
		<script type="text/javascript">
			function displayAlbum()
			{
				var id = document.getElementById("tituloAlbum").value;
				document.getElementById('myAlbum').style.display = 'block';
				document.getElementById('form').style.display = 'none';
				if(id.length==0 || id.trim()=="")
				{
					alert('Introduce un título o palabra clave (mínimo 3 caracteres)');
					//document.getElementById('form').style.display = 'block';
					window.location.replace("buscarAlbum.php");

				}else{
					id=id.trim();
					var xmlhttp = new XMLHttpRequest();
			
					xmlhttp.onreadystatechange = function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("myAlbum").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","obtenerAlbum.php?id="+id); 
					xmlhttp.send();
				}
			}
			function displayAlbum2()
			{
				var id = document.getElementById("etiqueta").value;
				document.getElementById('myAlbum').style.display = 'block';
				document.getElementById('form').style.display = 'none';
				if(id.length==0 || id.trim()=="")
				{
					alert('Introduce un título o palabra clave (mínimo 3 caracteres)');
					window.location.replace("buscarAlbum.php");
				}else{
					id=id.trim();
					var xmlhttp = new XMLHttpRequest();
			
					xmlhttp.onreadystatechange = function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("myAlbum").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","obtenerAlbum.php?id="+id+"&etiq=si"); 
					xmlhttp.send();
				}
			}
			function showForm()
			{
				document.getElementById('form').style.display = 'block';
				document.getElementById('myAlbum').style.display = 'none';

			}
			function showForm2()
			{
				window.location.replace("buscarAlbum.php");

			}
		</script>
		<script type="text/javascript">
			$('.preview').on('click',  function() {
	    		$('#changeMe').prop('src', this.src);
			});
		</script>
	</body>
</html>