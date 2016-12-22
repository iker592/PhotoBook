
		<?php
		 //echo $rol;
			session_start();
			if(isset($_SESSION['username'])){
				?>
					<ul>
					  <li><a class="active" href="home.php"><img id="logo" src="imagenes/logo.png" alt="logo"/></a></li>
					  <li><a href="buscarAlbum.php">Buscar Album</a></li>
					  <li><a href="multiupload.php">Crear Album</a></li>
					  <?php
						if($rol=='admin') echo '<li><a href="gestionAdmin.php">Gestionar Usuarios</a></li>';
						//else echo '<li><a href="gestionarAlbumes.php">Gestionar Albumes</a></li>';
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
