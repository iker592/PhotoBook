{"filter":false,"title":"borrar.php","tooltip":"/inc/borrar.php","undoManager":{"mark":33,"position":33,"stack":[[{"start":{"row":0,"column":0},"end":{"row":23,"column":2},"action":"insert","lines":["<?php","$servername = getenv('IP');","$username = getenv('C9_USER');","$password = \"\";","$dbport = 3306;","// Create connection","$link = new mysqli($servername, $username, $password, \"quiz\", $dbport);","//$link = mysqli_connect(\"mysql.hostinger.es\", \"u410012855_root\", \"quepazaloko23\", \"u410012855_quiz\");","","$usuarios = mysqli_query($link, \"select * from usuario\" );","echo '<table border=1> <tr> <th> Nombre y Apellidos </th> <th> Correo </th> <th> Imagen</th>","</tr>';","","while ($row = mysqli_fetch_array( $usuarios )) {","\t","echo '<tr><td>' . $row['NombreApellidos'] . '</td> <td>' . $row['Correo'] . '</td>"," <td> <div><img src=\"'.$row['ruta'].'\" width=\"180px\" height=\"214px\"/></div></td></tr>';","}","","echo '</table>';","$usuarios->close(); //poner notacion no OO","mysqli_close($link);","echo \"<p> <a href='layout.html'> Volver a inicio </a>\";","?>"],"id":1}],[{"start":{"row":6,"column":55},"end":{"row":6,"column":59},"action":"remove","lines":["quiz"],"id":2},{"start":{"row":6,"column":55},"end":{"row":6,"column":56},"action":"insert","lines":["p"]}],[{"start":{"row":6,"column":56},"end":{"row":6,"column":57},"action":"insert","lines":["h"],"id":3}],[{"start":{"row":6,"column":55},"end":{"row":6,"column":57},"action":"remove","lines":["ph"],"id":4},{"start":{"row":6,"column":55},"end":{"row":6,"column":64},"action":"insert","lines":["photobook"]}],[{"start":{"row":9,"column":47},"end":{"row":9,"column":54},"action":"remove","lines":["usuario"],"id":5},{"start":{"row":9,"column":47},"end":{"row":9,"column":48},"action":"insert","lines":["f"]}],[{"start":{"row":9,"column":48},"end":{"row":9,"column":49},"action":"insert","lines":["o"],"id":6}],[{"start":{"row":9,"column":49},"end":{"row":9,"column":50},"action":"insert","lines":["t"],"id":7}],[{"start":{"row":9,"column":50},"end":{"row":9,"column":51},"action":"insert","lines":["o"],"id":8}],[{"start":{"row":10,"column":33},"end":{"row":10,"column":51},"action":"remove","lines":["Nombre y Apellidos"],"id":9},{"start":{"row":10,"column":33},"end":{"row":10,"column":34},"action":"insert","lines":["a"]}],[{"start":{"row":10,"column":34},"end":{"row":10,"column":35},"action":"insert","lines":["l"],"id":10}],[{"start":{"row":10,"column":35},"end":{"row":10,"column":36},"action":"insert","lines":["b"],"id":11}],[{"start":{"row":10,"column":36},"end":{"row":10,"column":37},"action":"insert","lines":["u"],"id":12}],[{"start":{"row":10,"column":37},"end":{"row":10,"column":38},"action":"insert","lines":["m"],"id":13}],[{"start":{"row":10,"column":50},"end":{"row":10,"column":56},"action":"remove","lines":["Correo"],"id":14},{"start":{"row":10,"column":50},"end":{"row":10,"column":51},"action":"insert","lines":["u"]}],[{"start":{"row":10,"column":51},"end":{"row":10,"column":52},"action":"insert","lines":["s"],"id":15}],[{"start":{"row":10,"column":52},"end":{"row":10,"column":53},"action":"insert","lines":["u"],"id":16}],[{"start":{"row":10,"column":53},"end":{"row":10,"column":54},"action":"insert","lines":["a"],"id":17}],[{"start":{"row":10,"column":54},"end":{"row":10,"column":55},"action":"insert","lines":["r"],"id":18}],[{"start":{"row":10,"column":55},"end":{"row":10,"column":56},"action":"insert","lines":["i"],"id":19}],[{"start":{"row":10,"column":56},"end":{"row":10,"column":57},"action":"insert","lines":["o"],"id":20}],[{"start":{"row":15,"column":24},"end":{"row":15,"column":39},"action":"remove","lines":["NombreApellidos"],"id":21},{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["a"]}],[{"start":{"row":15,"column":25},"end":{"row":15,"column":26},"action":"insert","lines":["l"],"id":22}],[{"start":{"row":15,"column":26},"end":{"row":15,"column":27},"action":"insert","lines":["b"],"id":23}],[{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"insert","lines":["m"],"id":24}],[{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"remove","lines":["m"],"id":25}],[{"start":{"row":15,"column":24},"end":{"row":15,"column":27},"action":"remove","lines":["alb"],"id":26},{"start":{"row":15,"column":24},"end":{"row":15,"column":29},"action":"insert","lines":["album"]}],[{"start":{"row":15,"column":55},"end":{"row":15,"column":61},"action":"remove","lines":["Correo"],"id":27},{"start":{"row":15,"column":55},"end":{"row":15,"column":56},"action":"insert","lines":["u"]}],[{"start":{"row":15,"column":56},"end":{"row":15,"column":57},"action":"insert","lines":["s"],"id":28}],[{"start":{"row":15,"column":55},"end":{"row":15,"column":57},"action":"remove","lines":["us"],"id":29},{"start":{"row":15,"column":55},"end":{"row":15,"column":62},"action":"insert","lines":["usuario"]}],[{"start":{"row":16,"column":29},"end":{"row":16,"column":33},"action":"remove","lines":["ruta"],"id":30},{"start":{"row":16,"column":29},"end":{"row":16,"column":30},"action":"insert","lines":["s"]}],[{"start":{"row":16,"column":30},"end":{"row":16,"column":31},"action":"insert","lines":["r"],"id":31}],[{"start":{"row":16,"column":31},"end":{"row":16,"column":32},"action":"insert","lines":["c"],"id":32}],[{"start":{"row":22,"column":0},"end":{"row":22,"column":1},"action":"insert","lines":["/"],"id":33}],[{"start":{"row":22,"column":1},"end":{"row":22,"column":2},"action":"insert","lines":["/"],"id":34}]]},"ace":{"folds":[],"scrolltop":240,"scrollleft":0,"selection":{"start":{"row":22,"column":13},"end":{"row":22,"column":13},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":13,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1481492001256,"hash":"cf275238a4e272c987974a07dd7d631ce6d7753d"}