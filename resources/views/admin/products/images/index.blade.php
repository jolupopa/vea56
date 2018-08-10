@extends('layouts.app')

@section('title', 'Imagenes de Productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
<div class="main main-raised">
	<div class="container">

		<div class="section text-center">

			<h2 class="title"> Imagenes del producto: "{{$product->name}}" </h2>

			{!! Form::open(['files' => true] ) !!}

			{!! Form::file('photo') !!}
			<br>
			{!! Form::submit('Subir Imagen', ['class' => 'btn btn-primary btn-round'])!!}

			<a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Regresar al listado de productos</a>

			{!! Form::close() !!}



			<hr>
			<div class="row">
				@foreach($images as $image)
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
						<img class="card-img-top" src="{{ $image->image }}" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">Some {{ $image->id }} quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>

						<form method="post" action="">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							{{-- equivalente al method_field(DELETE) = <input type="hidden" name="_method" value="DELETE"> --}}
							<input type="hidden" name="image_id" value="{{ $image->id }}">
							<button type="submit" rel="tooltip" title="Eliminar" class="text-danger float-right"><i class="fa fa-times"></i></button>
						</form>

					</div>
				</div>
				@endforeach
			</div>

		</div>

	</div>
</div>

@include('includes.footer')

@endsection
