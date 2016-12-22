<?php
	require_once('inc/head.inc');
	echo '<body>';	
	require_once('inc/plantilla.inc');
?>
 		<div class="form">
 			<h1>Registro</h1>
 			<form id="registro" action="registro.php" method="post" enctype="multipart/form-data">
   				Username:<br/> <input type="text" placeholder="usuario"  required id="usuario" name="usuario" /> <br/>    <!--   pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$"       -->
   				Email:<br/> <input type="text" placeholder="email" required id="email" pattern="^[a-zA-Z]+[0-9]{3}@ikasle.ehu.(es|eus)$" oninvalid="this.setCustomValidity('Introduce un email válido.\n Ejemplo: jvadillo001@ikasle.ehu.eus')" oninput="setCustomValidity('')" name="email" /> <br/>            
   				Teléfono:<br/> <input type="text" placeholder="telefono" required pattern="^[0-9]{9}$" id="telefono" name="telefono" oninvalid="this.setCustomValidity('Introduce un número de teléfono válido; 9 dígitos')" oninput="setCustomValidity('')" /> <br/>            
				Contraseña: <br/><input type="password" placeholder="contraseña" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$" id="pass"  required oninvalid="this.setCustomValidity('La clave introducida no cumple los requisitos: \n Mínimo 8 caracteres \n Máximo 15 \n Al menos una letra mayúscula. Al menos una letra minúscula. Al menos un dígito. No espacios en blanco. Al menos 1 carácter especial')" oninput="setCustomValidity('')" name="pass" value="" /><br/>  <!-- pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$" -->
				Repita Contraseña: <br/><input type="password" placeholder="contraseña" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$" id="pass2"  required oninvalid="this.setCustomValidity('La clave introducida no cumple los requisitos: \n Mínimo 8 caracteres \n Máximo 15 \n Al menos una letra mayúscula. Al menos una letra minúscula. Al menos un dígito. No espacios en blanco. Al menos 1 carácter especial')" oninput="setCustomValidity('')" name="pass2" value="" /><br/>  <!-- pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$" -->
				<input id="input" type="submit" value="Registrarse"/>
			</form>
		</div>
	</body>
</html>
<?php
	if (isset($_POST['usuario']) && isset($_POST['email'])&& isset($_POST['telefono'])&& isset($_POST['pass'])){
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
	    $username=$_POST['usuario']; 
	    $email=$_POST['email'];
	    $telefono=$_POST['telefono']; 
	    $pass=$_POST['pass']; 
	    $pass2=$_POST['pass2']; 
		$password = sha1($_POST['pass']);
		
		if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/", $_POST['pass']))
		{
			echo '<script language="javascript">alert("La contraseña debe contener una letra mayúscula, un número y un caracter especial, ejemplo: Holaquetal23*");</script>';	
		}else if (!preg_match("/^[a-zA-Z]+[0-9]{3}@ikasle.ehu.(es|eus)$/", $_POST['email']))
		{
			echo '<script language="javascript">alert("Email introducido incorrecto, ejemplo: iredondo019@ikasle.ehu.eus");</script>';	
		}else if(!preg_match("/^[0-9]{9}$/", $_POST['telefono']))
		{
			echo '<script language="javascript">alert("El numero de telefono introducido es incorrecto");</script>';				
		}else if($pass!=$pass2){
		echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>'; 
		}else{
			$sql="INSERT INTO usuario (username, password, email, telefono) VALUES ('$username','$password','$email','$telefono')";
			if (!mysqli_query($mysqli ,$sql))
			{
				$str=mysqli_error($mysqli);
				$str=substr($str, 0, 15);
				echo ("<SCRIPT LANGUAGE='JavaScript'>
	    			window.alert('Error en la base de datos: $str (error completo al final de esta página)')
				    </SCRIPT>");
				die('Error: ' . mysqli_error($mysqli));
			}
					echo ("<SCRIPT LANGUAGE='JavaScript'>
	    			window.alert('Bienvenido al sistema $username, en breves el administrados aceptará tu solicitud para disfrutar de nuestra página web.')
					 window.location.href='login.php';
				    </SCRIPT>");
		}
    	mysqli_close($mysqli);
}
