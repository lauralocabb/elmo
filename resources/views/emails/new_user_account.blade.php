<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva cuenta de usuario</title>
</head>
<body>
	<h1>Bienvenido a nuestra Tienda demo online</h1><hr>
	<p>Tu cuenta ha sido creada con los siguientes datos:</p>
	<p><b>Nombre: </b>{{ $user->name . " " . $user->last_name }}</p>
	<p><b>Usuario: </b>{{ $user->user }}</p>
	<p><b>Correo: </b>{{ $user->email }}</p>
	<p><b>Password: </b>{{ $password }}</p>

	<p><b>Importante: </b></p>
	<ul>
		<li>Puedes iniciar sesión en nuestro sitio web con tu <b>correo</b> y <b>password</b></li>
		<li>Puedes cambiar tu password en la sección <b>Mi Perfil</b>, una vez que hayas iniciado sesión</li>
		<li>Si quieres publicar productos, cambia tu tipo de cuenta a <b>Publicador</b> en la sección <b>Mi perfil</b></li>
	</ul>
</body>
</html>