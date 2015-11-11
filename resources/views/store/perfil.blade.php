@extends('store.template')

@section('content')

	<div class="container text-center">
		
		<div class="page-header">
			<h1>
				<i class="fa fa-user"></i> {{ $user->name . " " . $user->last_name }} <small>[ Mi Perfil ]</small>
			</h1>
		</div>
		
		@if (count($errors) > 0)
			@include('partials.errors')
		@endif
		
		{!! Form::model($user, array('route' => array('post-perfil', $user))) !!}
		
			<div class="row">
				<div class="col-md-4">
					
					<fieldset class="form-perfil-fieldset">
						<legend>Datos generales:</legend>
						
						<div class="form-group">
							<label for="user">Usuario:</label>
							
							{!! 
								Form::text(
									'user', 
									null, 
									array(
										'class'=>'form-control',
										'placeholder' => 'Ingresa el nombre de usuario...',
										'disabled' => 'disabled'
										//'required' => 'required'
									)
								) 
							!!}
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
										'required' => 'required'
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
										'required' => 'required'
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
										'required' => 'required'
									)
								) 
							!!}
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
						
					</fieldset>
				
					
					
				</div>
				
				<div class="col-md-4">
					
					<fieldset class="form-perfil-fieldset">
						<legend>Tipo de Usuario:</legend>
						
						<div class="form-group">
							<div class="panel">
								<p>{!! Form::radio('type', 'user', $user->type=='user' ? true : false) !!} Usuario común</p>
								<p><small>Puedes realizar pedidos y navegar todo el sitio.</small></p>
							</div>
							
							<div class="panel">
								<p>{!! Form::radio('type', 'publisher', $user->type=='publisher' ? true : false) !!} Publicador</p>
								<p><small>Puedes realizar pedidos y navegar todo el sitio.</small></p>
								<p><small>Además puedes publicar tus propios productos.</small></p>
							</div>
							
						</div>
						
						<div class="panel">
							
							<p class="text-justify">
								<b>Importante:</b> Si cambias tu cuenta de <i>Usuario común</i> a <i>Publicador</i> es neccesario que nos proporciones 
								tu número de telefono y número de celular.
							</p>
							
							<div class="form-group">
								
								<label for="telefono">Telefono:</label>
								
								{!! 
									Form::text(
										'telefono', 
										null, 
										array(
											'class'=>'form-control',
											'placeholder' => 'Ingresa el número de telefono...',
											//'required' => 'required'
										)
									) 
								!!}
							</div>
							
							<div class="form-group">
								<label for="celular">Celular:</label>
								
								{!! 
									Form::text(
										'celular', 
										null, 
										array(
											'class'=>'form-control',
											'placeholder' => 'Ingresa el número de celular...',
											//'required' => 'required'
										)
									) 
								!!}
							</div>
							
							<p>{!! Form::checkbox('info_visible', '1', $user->info_visible == 1 ? true : false) !!} Acepto que mi telefono y celular se muestren junto
							a mis productos publicados</p>
							
						</div>
						
					</fieldset>
					
				</div>
				
				<div class="col-md-4">
					
					<fieldset class="form-perfil-fieldset">
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
					
				</div>
			</div>
			
			<!--<div class="form-group">
				<label for="active">Active:</label>
				
				{!! Form::checkbox('active', null, $user->active == 1 ? true : false) !!}
			</div><hr>-->
			
			<hr>
			
			<div class="form-group">
				{!! Form::submit('Actualizar Perfil', array('class'=>'btn btn-primary')) !!}
			</div>
		
		{!! Form::close() !!}

		
	</div>

@stop
