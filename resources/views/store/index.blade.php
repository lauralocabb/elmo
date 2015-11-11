@extends('store.template')

@section('content')

@include('store.partials.slider')

<div class="container text-center">
	<div id="products">
		@foreach($products as $product)
			<div class="product white-panel">
				<h3>{{ $product->name }}</h3><hr>
				<img src="{{ $product->image }}" width="200">
				<div class="product-info panel">
					<p>{{ $product->extract }}</p>
					<h3><span class="label label-success">Precio: ${{ number_format($product->price,2) }}</span></h3>

					<p>
                        <b>Publicado por: </b> {{ $product->user->name . " " . $product->user->last_name }}
                    </p>
                    
                    @if($product->user->info_visible)
                        @if($product->user->telefono != "")
                            <p>
                                <b>Teléfono: </b> {{ $product->user->telefono }}
                            </p>
                        @endif
                        @if($product->user->celular != "")
                            <p>
                                <b>Celular: </b> {{ $product->user->celular }}
                            </p>
                        @endif
                        <hr>
                    @endif

					<p>
						<a class="btn btn-warning" href="{{ route('cart-add', $product->slug) }}">
							<i class="fa fa-cart-plus"></i> La quiero
						</a>
						<a class="btn btn-primary" href="{{ route('product-detail', $product->slug) }}"><i class="fa fa-chevron-circle-right"></i> Leer mas</a>
					</p>
				</div>
			</div>
		@endforeach
	</div>

	<hr>
            
    <?php echo $products->render(); ?>
</div>
@stop