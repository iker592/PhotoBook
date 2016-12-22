<?php
	require_once('inc/head.inc');
	echo '<body>';	
	require_once('inc/plantilla.inc');
?>
 		<div class="form">
 			<h1>Iniciar Sesión</h1>
 			<form id="login" action="login.php" method="post">
   				Username:<br/> <input type="text" placeholder="username"  required id="usuario" name="usuario" /> <br/>      <!--      pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$" -->
				Contraseña: <br/><input type="password" placeholder="contraseña" required id="pass"  name="pass" value="" /><br/>  <!-- pattern="^[a-z0-9ü][a-z0-9ü_]{3,9}$" -->
				<input id="input" type="submit" value="Iniciar sesión"/>
			</form>
		</div>
	</body>
</html>
<?php
	if (isset($_POST['usuario']) && isset($_POST['pass'])){
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
	    $pass=$_POST['pass']; 
	    $password = sha1($_POST['pass']);
	    
		$usuarios = mysqli_query($mysqli,"select * from usuario where username='$username' and password='$password'"); 
		$cont= mysqli_num_rows($usuarios);
		$row = mysqli_fetch_array($usuarios);
	    if($cont==1 && $row['aceptado']=="si"){
	        session_start();
			$_SESSION["username"]=$username;
			if($username=="admin"){
				$_SESSION["rol"]="admin";
				echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Hola de nuevo admin')
			    window.location.href='home.php';
			    </SCRIPT>"); //cambiar la redireccion!
			}else{
				$_SESSION["rol"]="alumno";
				echo ("<SCRIPT LANGUAGE='JavaScript'>
    			window.alert('Hola de nuevo $username')
				 window.location.href='home.php';
			    </SCRIPT>");
			}
	    }else 	echo "<SCRIPT type='text/javascript'> //not showing me this
	     alert('Datos erroneos o todavía no has sido aceptado por el admin, disculpa las molestias');
	     window.location.replace(\"login.php\");
	    </SCRIPT>";
	}
?>