<?php

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

	    $tituloAlbum=$_GET['id'];
	    $id=$_GET['id'];
	    if($id=="viajess"){
	        session_start();
            $rol=$_SESSION["rol"];
	        require_once('inc/head.inc');
	        echo '<body onLoad="albumesRandom()">';
	        require_once('inc/plantilla.inc');
	        $id="viajes";
	        $tituloAlbum="viajes";
	    }
	    
	    $etiq=$_GET['etiq'];
	    session_start();
	    $username=$_SESSION["username"];
	    if($etiq=="si")
		    $fotos = mysqli_query($mysqli,"select * from foto where etiqueta='$id'"); 
	    else
		    $fotos = mysqli_query($mysqli,"select * from foto where album='$tituloAlbum'"); 
		
		$cont= mysqli_num_rows($fotos); 
	    if($cont>=1){
			echo '<button id="boton2" style="height:50px;width:100px;background:grey" onclick="showForm()">Atrás</button></br>';
            echo '<table border=1> <tr> <th> Usuario </th> <th> Etiqueta </th> <th> Imagen (Click para ver en tamaño original)</th></tr>';
            
            while ($row = mysqli_fetch_array( $fotos )) {
                
                $src=$row['src'];

                if($username==$row['usuario'])
                {	
                        echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFotito.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
                        //echo 'username ';
                    
                }elseif($_SESSION["rol"]=="admin" )
                {
                    echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFotito.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
                    //echo 'admin ';
                }elseif(($row['visibilidad']== "accesoLimitado") && $username!="")
                {	
                        echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFoto.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
                        //echo '3accesoLimitado ';
                    
                }elseif($row['visibilidad']== "publica")
                {
                    $onclick="onclick=\"loadFoto(".$src.")";
                    echo '<tr><td>' . $row['usuario'] . '</td> <td>' . $row['etiqueta'] . '</td>
                         <td> <div><a href="verFoto.php?id='.$row['src'].'"><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
                    //echo '4publica ';
                }
            }
            echo '</table>';

           // echo '<a href="verFoto.php?id=1">';
           // echo '<img src= "imagenes/logo.png" width="450" height="400" id="grande" name="grande"/>';//'.$row['src'].'/>';
          //  echo '</a>';
     /*       echo'<div class="img-container">';
                echo'<img id="changeMe" src="" width="450" height="400">';
            echo'</div>';
          
            echo '<br/><br/>';

            while ($row = mysqli_fetch_array( $fotos )) {
                echo '<img class="preview" src= "'.$row['src'].'" width="100" height="77" />';
            }*/
 
            $fotos->close(); //poner notacion no OO
            mysqli_close($mysqli);


	    }elseif($cont==0){
	         echo 'No se han encontrado Álbumes';
	         echo '<button id="boton2" style="height:50px;width:100px;background:grey" onclick="showForm2()">Aceptar</button></br>';
	    }
?>