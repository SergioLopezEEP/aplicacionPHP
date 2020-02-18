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
<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  Tipo de vivienda: <select name="tipo">
  						<option value="todos">Todos</option>
  						<option value="piso">Piso</option>
  						<option value="chalet">Chalet</option>
  						<option value="estudio">Estudio</option>
  						<option value="adosado">Adosado</option>
  						<option value="casa">Casa</option>
					</select><br>
<input type="submit" value="Actualizar" name="actualizar"/>
<input type="button" name="volver" value="volver" id="btn1"/>
</form>

<?php
if(isset($_POST{'actualizar'})){
 $tipo=$_POST['tipo'];
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="dbs275754";
 $conn= new mysqli($servername,$username,$password,$dbname);

	if ($tipo=="todos") {
		$sql="SELECT * FROM viviendas";
		
	}else{
		$sql = "SELECT * FROM viviendas WHERE tipo='$tipo' ORDER BY precio ASC";


}
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
							"<form name='guardar' action='". $_SERVER['PHP_SELF']."' method='POST'>".
							"<input type='submit' name='imprimir' value='".$row['Id']."'>
							</form>".
							"</td>".
							"</tr>";
				}
			echo "</table>";


		} else {
    		echo "0 results";
}

$conn->close();
}
if(isset($_POST{'imprimir'})){

	$servername="localhost";
    $username="root";
    $password="";
    $dbname="dbs275754";
    $conn= new mysqli($servername,$username,$password,$dbname);
	$sql = "SELECT * FROM viviendas WHERE id=". $_POST['imprimir'];
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$myfile = fopen("files/id".$row['Id'].".txt", "w") or die("Unable to open file!");
		$txt ="Tipo:".$row['Tipo']."\n".
			  "Zona:".$row['Zona']."\n".
			  "Direccion:".$row['Direccion']."\n".
			  "Dormitorios:".$row['Dormitorios']."\n".
			  "Precio:".$row['Precio']."\n".
			  "Tamano:".$row['Tamano']."\n".
			  "Extras:".$row['Extras']."\n".
			  "Fto:".$row['foto']."\n".
			  "Observaciones:".$row['observaciones']."\n";
       		   fwrite($myfile, $txt);
               fclose($myfile);


               echo "Su archivo esta preparado, pulse <a href='files/id".$row["Id"].".txt'>aqui</a>";
		}

	
	}



}



?>



<form action="">
	<inpunt type="submit" value="Imprimir">
</form>
</body>
</html>