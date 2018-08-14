@extends('layouts.app')

@section('title', 'Imagenes de Productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
<div class="main main-raised">
	<div class="container">

		<div class="section text-center">

			@if (session('notification'))
			<div class="alert alert-success" role="alert">
				{{ session('notification') }}
			</div>
			@endif

			<h2 class="title"> Producto: "{{$product->name}}" </h2>

			<h4>Categoria: {{ $product->category['name']}}</h4>
			<hr>
			@guest

			<a href="{{ url('/') }}" class="btn btn-default btn-round" rel="tooltip" title="Regresar">Regresar </a>
			@else
			<button class="btn btn-primary btn-fab btn-round" data-toggle="modal" data-target="#modalCart">
				<i class="material-icons">shopping_cart</i>
			</button>

			<a href="{{ url('/') }}" class="btn btn-default btn-round" rel="tooltip" title="Regresar">Regresar </a>

			@endguest




			<hr>
			<div>
				<h3>Descripción</h3>
				<p>
					{{$product->long_description }}
				</p>
			</div>
			<div class="row">
				@foreach($images as $image)
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
						<img class="card-img-top" src="{{ $image->url }}" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">{{ $image->featured }}</p>
						</div>

						<form method="post" action="">

							@if($image->featured)


							@else

							@endif
						</form>

					</div>
				</div>
				@endforeach
			</div>

		</div>

		<div class="card-footer justify-content-center">
			<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
			<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
			<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir cantidad que desea comprar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{ url('/cart')}}">
				{{ csrf_field() }}
				<input type="hidden" name="product_id" value="{{ $product->id}}">
				<div class="modal-body">
					<input type="number" name="quantity" value="1" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Añadir al carrito</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('includes.footer')

@endsection
