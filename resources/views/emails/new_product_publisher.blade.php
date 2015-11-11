<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo producto</title>
	<style>
		table tr th
		{
			background: #fafafa;
			border:1px solid #ddd;
		}

		table tr td
		{
			border:1px solid #ddd;
			padding:3px;
		}

		b
		{
			color: red;
		}
	</style>
</head>
<body>
	<h1>El publicador {{ auth()->user()->name . " " . auth()->user()->last_name }} agrego un producto</h1><hr>

	<table>
		<tr>
			<th>Imagen</th>
			<th>Producto</th>
			<th>Categoría</th>
			<th>Descripción corta</th>
			<th>Precio</th>
		</tr>
		<tr>
			<td><img src="{{ $product->image }}" width="40"></td>
			<td>{{ $product->name }}</td>
			<td>{{ $product->category->name }}</td>
			<td>{{ $product->extract }}</td>
			<td>${{ number_format($product->price,2) }}</td>
		</tr>
	</table><hr>

	<p><b>Importante: </b>Este producto no será visible en el catalogo de la tienda en línea hasta que lo apruebes, para ello debes ir a tu 
	Panel de administración, editar el producto y habilitar la casilla de visible.</p>

</body>
</html>