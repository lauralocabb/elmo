@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i> MY LARAVEL STORE - DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->user }} a tu Panel de administración.</h2><hr>
        
        <div class="row">
            
            <div class="col-md-6 col-md-offset-3">
                
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                </div>
                
                @if ( Auth::check() && Auth::user()->type == 'admin' )
                
                    <div class="panel">
                        <i class="fa fa-list-alt icon-home"></i>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-warning btn-block btn-home-admin">CATEGORÍAS</a>
                    </div>
          
                    <div class="panel">
                        <i class="fa fa-cc-paypal  icon-home"></i>
                        <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                    </div>
              
                    <div class="panel">
                        <i class="fa fa-users  icon-home"></i>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                    </div>
                    
                @endif
                
            </div>
                    
        </div>
        
    </div>
    <hr>

@stop