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
<form action="alta.php" method="post" name="formulario" enctype="multipart/form-data">
  Tipo de vivienda: <select name="tipo">
  						<option value="piso">Piso</option>
  						<option value="chalet">Chalet</option>
  						<option value="estudio">Estudio</option>
  						<option value="adosado">Adosado</option>
  						<option value="casa">Casa</option>
					</select><br>
 			  Zona: <select name="zona">
  						<option value="norte">Norte</option>
  						<option value="sur">Sur</option>
  						<option value="este">Este</option>
  						<option value="oeste">Oeste</option>
					</select><br>
  Direccion: <input type="text" name="direccion"><br>
  Numero de dormitorios: 
               <input type="radio" value="1" name="dormitorio">1
  						 <input type="radio" value="2" name="dormitorio">2
  						 <input type="radio" value="3" name="dormitorio">3
  						 <input type="radio" value="4" name="dormitorio">4
  						 <br>
  Precio: <input type="text" name="precio"><br>
  Tamaño: <input type="text" name="tamaño"><br>
  Extras(marquen los que procedan): <input type="checkbox" name="extras[]" value="piscina">piscina
                                    <input type="checkbox" name="extras[]" value="garaje">garaje
                                    <input type="checkbox" name="extras[]" value="jardin">jardin
                                    <br>
  Foto: <input type="file" name="fileToUpload" id="fileToUpload"><br>	
  Observaciones: <input type="text" name="observaciones"><br>
  <input type="submit" value="Insertar vivienda" name="insertar">
  <input type="button" value="Volver" name="volver" id="volver">
  </form>

</body>
</html>