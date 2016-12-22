<?php
$username=$_GET['username']; 
//echo $username;
 		echo'<div class="form" id="form">';
 			echo'<h1> Usuario: '.$username.' </h1>';
 			echo'<form id="buscar" action="guardarUser.php?username='.$username.'" method="post">';
   				echo'Username:<br/> <input type="text" placeholder="Username"  id="username" name="username" /> <br/>';  
   				echo'Email:<br/> <input type="text" placeholder="Email"  id="email" name="email" /> <br/>';  
   				echo'Telefono:<br/> <input type="text" placeholder="Telefono"  id="telefono" name="telefono" /> <br/>';    
   				echo'Aceptado:<br/> <input type="text" placeholder="Aceptado"  id="aceptado" name="aceptado" /> <br/>';  
				echo'<input id="input" type="submit" value="Editar"/>';
			echo'</form>';
			//echo'<button id="boton" onclick="eliminarUsuario()">Buscar por Etiqueta</button>';
		echo'</div>';
	echo'</body>';
echo'</html>';
?>