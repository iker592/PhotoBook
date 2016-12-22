<?php
/*
+---------------------------+
| @@hostname                |
+---------------------------+
| iker592-photobook-4137157 |
+---------------------------+
*/
session_start();
$rol=$_SESSION["rol"];
	require_once('inc/head.inc');
	echo '<body onLoad="showUsuarios()">';
	require_once('inc/plantilla.inc');
	require_once('inc/sessionUsername.inc');
	require_once('inc/sessionAdmin.inc');
?>



<div id=myDiv></div>
        <script type="text/javascript">
	        function showUsuarios()
	        {
	        	var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
		        	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		        	{
		        		document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
		        	}
	        	}
	        	xmlhttp.open("GET","cogerUsuarios.php"); 
	        	xmlhttp.send();
	        }
	        function editUser(username)
	        {
                var xmlhttp = new XMLHttpRequest();
	        	xmlhttp.onreadystatechange = function()
	        	{
		        	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		        	{
		        		document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
		        	}
	        	}
	        	xmlhttp.open("GET","editUser.php?username="+username); 
	        	xmlhttp.send();
	        }
	        function showForm()
			{
				window.location.replace("home.php");

			}
		</script>
	     </script>
	</body>
</html>