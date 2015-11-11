<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva cuenta de usuario</title>
</head>
<body>
	<h1>Se ha creado una nueva cuenta en tu Tienda demo online</h1><hr>
	<p>La cuenta ha sido creada con los siguientes datos:</p>
	<p><b>Nombre: </b>{{ $user->name . " " . $user->last_name }}</p>
	<p><b>Usuario: </b>{{ $user->user }}</p>
	<p><b>Correo: </b>{{ $user->email }}</p>

	<p><b>Importante: </b>Desde tu Panel de administración, puedes:</p>
	<ul>
		<li>Modificar/Eliminar a este usuario </li>
		<li>Validar/Administrar los productos que de de alta</li>
	</ul>
</body>
</html>