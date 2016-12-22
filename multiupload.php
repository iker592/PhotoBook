<!DOCTYPE html>
<html>
    <head>
		<title>Subida multiple de fotos usando jquery y PHP</title>
		<!-------Including jQuery from google------>
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
		<!-------Including CSS File------>
        <link rel="stylesheet" type="text/css" href="estilo/style.css">
    <body>
		<?php
		 echo $rol;
			session_start();
			if(isset($_SESSION['username'])){
				?>
					<ul>
					  <li><a class="active" href="home.php"><img id="logo" src="imagenes/logo.png" alt="logo"/></a></li>
					  <li><a href="buscarAlbum.php">Buscar Album</a></li>
					  <?php
						if($rol=='admin') echo '<li><a href="gestionarAlbumes.php">Gestionar Albumes</a></li>';
					  ?>
					  <li style="float:right"><a href="logout.php">Cerrar sesión</a></li>
					</ul>
				<?php
			}else{
				?>
					<ul>
					  <li><a class="active" href="home.php"><img id="logo" src="imagenes/logo.png" alt="logo"/></a></li>
					  <li><a href="buscarAlbum.php">Buscar Album</a></li>
					  <li style="float:right"><a href="login.php">Iniciar Sesión</a></li>
					  <li style="float:right"><a href="registro.php">Registrarse</a></li>
					</ul>
				<?php
			}
		?>

        <div id="maindiv">

            <div id="formdiv">
               <h1>Crear Álbum</h1>

                <form enctype="multipart/form-data" action="" method="post">

	           		Título Álbum:<br/> <input type="text"  required id="titulo" name="titulo" /> <br/><br/> 
                  <!--  Sólo se admiten los formatos JPEG,PNG,JPG. El tamaño de la imagen debería ser menor de 100MB. -->
                    <hr/>
                    <h2>Añade Fotos a tu Álbum!</h2>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="upload" value="Añadir más archivos"/>
                    <input type="submit" value="Subir foto(s)" name="submit" id="upload" class="upload"/>
                </form>
                <br/>
                <br/>
				<!-------Including PHP Script here------>
                <?php include "upload.php"; ?>
            </div>
           
		   <!-- Right side div -->

        </div>
    </body>
</html>