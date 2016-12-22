<?php
    $servername = getenv('IP'); //mysql.hostinger.es
    $username = getenv('C9_USER'); //u410012855_root
    $password = "";
    $dbport = 3306; //u410012855_quiz
    // Create connection
    $link = new mysqli($servername, $username, $password, "photobook", $dbport); 
    //$link = mysqli_connect("mysql.hostinger.es", "u410012855_root", "", "u410012855_quiz");
    
    $usuarios = mysqli_query($link, "select * from foto" );
    echo '<table border=1> <tr> <th> album </th> <th> usuario </th> <th> Imagen</th>
    </tr>';
    
    while ($row = mysqli_fetch_array( $usuarios )) {
    	
    echo '<tr><td>' . $row['album'] . '</td> <td>' . $row['usuario'] . '</td>
     <td> <div><img src="'.$row['src'].'" width="180px" height="214px"/></div></td></tr>';
    }
    
    echo '</table>';
    $usuarios->close(); //poner notacion no OO
    mysqli_close($link);
    //echo "<p> <a href='layout.html'> Volver a inicio </a>";
?>