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
<input type="botton" name="volver" value="volver" id="btn2">

<?php
if(isset($_POST{'insertar'})){
 
 $tipo=$_POST['tipo'];
 $zona =$_POST['zona'];
 $direccion =$_POST['direccion'];
 $dormitorio=$_POST['dormitorio'];
 $precio =$_POST['precio'];
 $tamaño =$_POST['tamaño'];
 $extras=$_POST['extras'];
 $observaciones=$_POST['observaciones'];
 $auxExtra="";
 for ($i=0; $i < sizeof($extras); $i++) { 
 	$auxExtra= $extras[$i]. "";
 }

//FOTO
 $target_dir =$_SERVER['DOCUMENT_ROOT']. "/joomla/php/ProyectoViviendas/img/";

 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;

 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
//

 $servername="localhost";
 $username="root";
 $password="";
 $dbname="dbs275754";
 $conn= new mysqli($servername,$username,$password,$dbname);



	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";

    $precio = floatval($precio);
	$tamaño = intval($tamaño);
	$dormitorio = intval($dormitorio);

	// echo "Tipo:".$tipo."\n";
	// echo "Zona:".$zona."\n";
	// echo "Direccion:".$direccion."\n"; 
	// echo "Dormitorio:".$dormitorio."\n";
	// echo "Precio:".$precio."\n"; 
	// echo "Tamano:".$tamaño."\n"; 
	// echo "Extras:".$extras."\n";
	// echo "Fto:".$foto."\n";
	// echo "Observaciones:".$observaciones."\n";

	$stmt = $conn->prepare("INSERT INTO viviendas (Tipo, Zona, Direccion, Dormitorios, Precio, Extras, foto, observaciones, Tamano) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('sssidsssi', $tipo, $zona, $direccion,$dormitorio, $precio, $auxExtra, $target_file, $observaciones,$tamaño);
	
	$stmt->execute();
	if ($stmt->affected_rows){
	 echo "New record created successfully";
	}else{
	 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	 $stmt->close();
}
?>

</body>
</html>
