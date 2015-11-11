@extends('store.template')

@section('content')
	<div class="container text-center">

		<div class="page-header">
		  <h1><i class="fa fa-user"></i> Registrarse</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="page">

				@include('store.partials.errors')

					<form method="POST" action="/auth/register">
						{!! csrf_field() !!}

						<div class="form-group">
							<label for="name">* Nombre</label>
							<input placeholder="Ingresa tu nombre.." class="form-control" type="text" name="name" value="{{ old('name') }}">
						</div>

						<div class="form-group">
							<label for="last_name">* Apellidos</label>
							<input placeholder="Ingresa tus apellidos..." class="form-control" type="text" name="last_name" value="{{ old('last_name') }}">
						</div>

						<div class="form-group">
							<label for="email">* Correo</label>
							<input placeholder="Ingresa un correo valido..." class="form-control" type="email" name="email" value="{{ old('email') }}">
						</div>

						<div class="form-group">
							<label for="user">* Usuario</label>
							<input placeholder="Ingresa un nombre de usuario..." class="form-control" type="text" name="user" value="{{ old('user') }}">
						</div>

						<div class="form-group">
							<label for="user">Telefono (Opcional)</label>
							<input placeholder="Ingresa tu número telefonico..." class="form-control" type="text" name="telefono" value="{{ old('telefono') }}">
						</div>

						<div class="form-group">
							<label for="user">Celular (Opcional)</label>
							<input placeholder="Ingresa tu número de celular..." class="form-control" type="text" name="celular" value="{{ old('celular') }}">
						</div>

						<div class="form-group">
							<label for="adrress">Dirección (Opcional)</label>
							<textarea class="form-control" name="address">{{ old('address') }}</textarea>
						</div>

						<p><sup>*</sup> Obligatorio.</p>

						<div class="form-group">
							<button class="btn btn-primary" type="submit">Crear cuenta</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
@stop
