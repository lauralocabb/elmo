@extends('admin.template')

@section('content')

	<div class="container text-center">
		
		<div class="page-header">
			<h1>
				<i class="fa fa-user"></i> USUARIOS <small>[ Editar usuario ]</small>
			</h1>
		</div>
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				
				<div class="page">
					
					@if (count($errors) > 0)
						@include('admin.partials.errors')
					@endif
					
					{!! Form::model($user, array('route' => array('admin.user.update', $user))) !!}
					
						<input type="hidden" name="_method" value="PUT">
						
						<div class="form-group">
							<label for="active">Active:</label>
							
							{!! Form::checkbox('active', null, $user->active == 1 ? true : false) !!}
						</div>
		
						<div class="form-group">
							<label for="name">Nombre:</label>
							
							{!! 
								Form::text(
									'name', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa el nombre...',
										'autofocus' => 'autofocus',
										//'required' => 'required'
									)
								) 
							!!}
						</div>
						
						<div class="form-group">
							<label for="last_name">Apellidos:</label>
							
							{!! 
								Form::text(
									'last_name', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa los apellidos...',
										//'required' => 'required'
									)
								) 
							!!}
						</div>
						
						<div class="form-group">
							<label for="email">Correo:</label>
							
							{!! 
								Form::text(
									'email', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa el correo...',
										//'required' => 'required'
									)
								) 
							!!}
						</div>
						
						<div class="form-group">
							<label for="user">Usuario:</label>
							
							{!! 
								Form::text(
									'user', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa el nombre de usuario...',
										//'required' => 'required'
									)
								) 
							!!}
						</div>
						
						<div class="form-group">
							<label for="type">Tipo:</label>
							
							{!! Form::radio('type', 'user', $user->type == 'user' ? true : false) !!} Usuario común
							{!! Form::radio('type', 'publisher', $user->type == 'publisher' ? true : false) !!} Publicador
							{!! Form::radio('type', 'admin', $user->type == 'admin' ? true : false) !!} Administrador
						</div>
						
						<div class="form-group">
							<label for="address">Dirección:</label>
							
							{!! 
								Form::textarea(
									'address', 
									null, 
									array(
										'class'=>'form-control'
									)
								) 
							!!}
						</div>
						
						<div class="form-group">
							<label for="name">Telefono:</label>
							
							{!! 
								Form::text(
									'telefono', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa el número de telefono...',
									)
								) 
							!!}
						</div>
						
						<div class="form-group">
							<label for="name">Celular:</label>
							
							{!! 
								Form::text(
									'celular', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa el número de celular...',
									)
								) 
							!!}
						</div>
						
						<fieldset>
							<legend>Cambiar password:</legend>
							<div class="form-group">
								<label for="password">Nuevo Password:</label>
								
								{!! 
									Form::password(
										'password', 
										array(
											'class'=>'form-control',
											//'required' => 'required'
										)
									) 
								!!}
							</div>
							
							<div class="form-group">
								<label for="confirm_password">Confirmar Nuevo Password:</label>
								
								{!! 
									Form::password(
										'password_confirmation',
										array(
											'class'=>'form-control',
											//'required' => 'required'
										)
									) 
								!!}
							</div>
						</fieldset>
						
						<div class="form-group">
							{!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
							<a href="{{ route('admin.user.index') }}" class="btn btn-warning">Cancelar</a>
						</div>
					
					{!! Form::close() !!}
					
				</div>
				
			</div>
		</div>
		
	</div>

@stop
