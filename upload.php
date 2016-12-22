<?php
if (isset($_POST['submit'])) {
    $j = 0; //Variable for indexing uploaded image 
    
	$target_path = "./imagenes/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
    $target_path = "./imagenes/";
        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.)

        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
	 //   $target_path = $target_path . basename($_FILES['file']['name'][$i]);
	//	echo $target_path;
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 100000000) //Approx. 100MB files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                echo $j. ').<span>Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
        
        $album=$_POST['titulo'];
        session_start();
        $usuario=$_SESSION['username'];//$_POST['usuario']; //COGER CON SESSION!!
        
        $nombreImagen=$_FILES['file']['name'][$i];
   		//$nombreImagen=substr($nombreImagen, 0, -4);

        
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
		 // Check connection
		if ($mysqli->connect_error) {
		    die("Connection failed: " . $mysqli->connect_error);
		} 
	//	echo "Connected successfully (".$mysqli->host_info.")";
		//$tituloAlbum=$_POST['titulo']; 
		$nombreImagen=substr($nombreImagen, 0, -4);
		$sql="INSERT INTO foto (album,usuario,src,titulo) VALUES ('$album','$usuario','$target_path','$nombreImagen')";
	
		if (!mysqli_query($mysqli ,$sql))
		{
			die('Error: ' . mysqli_error($mysqli));
		} 
		//else echo 'valores insertados';
    }
}
?>