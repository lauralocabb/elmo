@extends('admin.template')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@section('content')

	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				PRODUCTOS 
				<a href="{{ route('admin.product.create') }}" class="btn btn-warning">
					<i class="fa fa-plus-circle"></i> Producto
				</a>
			</h1>
		</div>
		<div class="page">
			@if(count($products))
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Editar</th>
								<th>Eliminar</th>
								@if(auth()->user()->type == 'admin')
									<th>Creador</th>
									<th>Fecha</th>
								@endif
								<th>Imagen</th>
								<th>Nombre</th>
								<th>Categoría</th>
								<th>Extracto</th>
								<th>Precio</th>
								<th>Visible</th>
								<th>Compartir</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td>
										<a href="{{ route('admin.product.edit', $product->slug) }}" class="btn btn-primary">
											<i class="fa fa-pencil-square-o"></i>
										</a>
									</td>
									<td>
										{!! Form::open(['route' => ['admin.product.destroy', $product->slug]]) !!}
											<input type="hidden" name="_method" value="DELETE">
											<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
												<i class="fa fa-trash-o"></i>
											</button>
										{!! Form::close() !!}
									</td>
									@if(auth()->user()->type == 'admin')
										<th>{{ $product->user->name . " " . $product->user->last_name }}</th>
										<th>{{ $product->created_at->format('d/m/Y') }}</th>
									@endif
									<td><img src="{{ $product->image }}" width="40"></td>
									<td>{{ $product->name }}</td>
									<td>{{ $product->category->name }}</td>
									<td>{{ $product->extract }}</td>
									<td>${{ number_format($product->price,2) }}</td>
									<td>{{ $product->visible == 1 ? "Si" : "No" }}</td>
									<td>
										@if($product->visible == 1)
											<div class="fb-share-button" 
												data-href="http://localhost:8000/product/{{ $product->slug }}"
												data-layout="icon_link">
											</div>
										@else
											---
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@if(auth()->user()->type == 'publisher')
					<h3>
						<span class="label label-info">
							<i class="fa fa-info-circle"></i> Los productos que des de alta NO serán visibles en la página hasta que el Administrador los apruebe.
						</span>
					</h3>
				@endif
			@else
				<h3><span class="label label-default">No tiene productos registrados :(</span></h3>
			@endif
			
			<hr>
			
			<?php echo $products->render(); ?>
			
		</div>

	</div>
	
@stop