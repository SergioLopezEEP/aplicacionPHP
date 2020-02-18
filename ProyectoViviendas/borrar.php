<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Formulario web -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Formulario web</title>
</head>
<body>

<?php
	$servername="localhost";
 	$username="root";
 	$password="";
 	$dbname="dbs275754";
 	$conn= new mysqli($servername,$username,$password,$dbname);
	$sql="SELECT * FROM viviendas";
	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
	
		echo "<table><tr><td>Tipo</td>
					<td>Zona</td>
					<td>Direccion</td>
					<td>Dormitorios</td>
					<td>Precio</td>
					<td>Extras</td>
					<td>Foto</td>
					<td>Observaciones</td>
					<td>Tamaño</td>		
					</tr>";

    		while($row = $result->fetch_assoc()) {
      				echo	"<tr>"."<td>". $row["Tipo"]."</td>".
							"<td>". $row["Zona"]."</td>".
							"<td>". $row["Direccion"].
							"<td>". $row["Dormitorios"]."</td>".
							"<td>". $row["Precio"]."</td>".
							"<td>". $row["Extras"]."</td>".
							"<td><a href='". $row["foto"]."'>Foto</a></td>".
							"<td>". $row["observaciones"]."</td>".
							"<td>". $row["Tamano"]."</td>". 
							"<td>".
							"<td>".
							"<form name='guardar' action='". $_SERVER['PHP_SELF']."' method='POST'>".
							"<input type='checkbox' name='eliminar[]' value='".$row['Id']."'>
							 <input type='submit' name='borrar' value='Borrar'>	
							</form>".
							"</td>".
							"</tr>";
				}
			echo "</table>";


		} else {
    		echo "0 results";
}

if(isset($_POST{'eliminar'})){
	if(!empty($_POST["eliminar"])){
		for($i = 0; $i < sizeof($_POST["eliminar"]);$i++) { 
			$sql = "DELETE FROM viviendas WHERE id=".$_POST["eliminar"][$i];
			$result = $conn->query($sql);
		}
	}else{
	echo "No has marcado ningun registro";
	}
}
?>
</body>
</html>