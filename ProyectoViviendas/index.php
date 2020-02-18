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
	<form name="index" action="formulario.php" method="post">
		<input type="submit" value="Alta" />
	</form>
	<form name="index" action="consultar.php" method="post">
		<input type="submit" value="Listar" />
	</form>
	<form name="index" action="borrar.php" method="post">
		<input type="submit" value="Borrar" />
	</form>
</body>
</html>