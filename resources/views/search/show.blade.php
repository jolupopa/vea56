@extends('layouts.app')

@section('title', 'Resultados de busquedas')

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

			<h2 class="title">Resultados de Busqueda" </h2>
			<div class="d-flex justify-content-center">
				<div class="card" style="width: 20rem;">
					<img class="card-img-top" src="img/flash.jpg" alt="Imagen de una lupa que representa a la pagina de resultados">
				</div>
			</div>
			<div>

				<p>
					Se encontraron {{$products->count() }} resultados para el término {{$query}}.
				</p>
			</div>

			<div class="section text-center">
				<h2 class="title">Productos de la categoria</h2>
				<div class="team">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-md-4">
							<div class="team-player">
								{{--  card --}}
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"><a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a></h4>

									</div>
									<div class="card-body">
										<div class="col-md-6 ml-auto mr-auto">
											<img src="{{ $product->featured_image_url }}" alt="Thumbnail Image"
											class="img-raised rounded-circle img-fluid">
										</div>
										<p class="card-description">{{ $product->description }}</p>

									</div>

								</div>{{--  card --}}
							</div>
						</div>
						@endforeach
					</div>
					<div class="row justify-content-center">
						<div> {{ $products->links() }}</div>
					</div>
				</div>
			</div>

		</div>

		<div class="card-footer justify-content-center">
			<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
			<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
			<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
		</div>

	</div>
</div>



@include('includes.footer')

@endsection
