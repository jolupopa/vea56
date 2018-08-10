@extends('layouts.app')

@section('title', 'Listado Productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
<div class="main main-raised">
	<div class="container">

		<div class="section text-center">
			<h2 class="title">Listado de Productos</h2>
			<div class="team">
				<div class="row justify-content-center">
					<a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="col-md-2 text-center">Nombre</th>
								<th class="col-md-4 text-center">Descripcion</th>
								<th class="text-center">Categorias</th>
								<th class="text-right">Precio</th>
								<th class="col-md-2 text-center">Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
							<tr>
								<td class="text-center">{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->description }}</td>
								<td>{{ $product->category ? $product->category->name : 'General' }}</td>
								<td class="text-right">&euro; {{ $product->price }}</td>
								<td class="td-actions d-flex justify-content-around">
									<a rel="tooltip" title="Ver" class="text-primary"><i class="fa fa-info"></i></a>
									<a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="text-warning"><i class="fa fa-edit"></i></a>
									<a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imagenes" class="text-success"><i class="fa fa-image"></i></a>
									<form method="post" action="{{ url('/admin/products/'.$product->id) }}">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										{{-- equivalente al method_field(DELETE) = <input type="hidden" name="_method" value="DELETE"> --}}
										<button type="submit" rel="tooltip" title="Eliminar" class="text-danger"><i class="fa fa-times"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div> {{ $products->links() }} </div>





				</div>
			</div>
		</div>

	</div>
</div>

@include('includes.footer')

@endsection
