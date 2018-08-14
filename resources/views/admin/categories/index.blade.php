@extends('layouts.app')

@section('title', 'Listado Categorias')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
<div class="main main-raised">
	<div class="container">

		<div class="section text-center">
			<h2 class="title">Listado de Categorias</h2>
			<div class="team">
				<div class="row justify-content-center">
					<a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva Categoria</a>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="col-md-2 text-center">Nombre</th>
								<th class="col-md-4 text-center">Descripcion</th>
								<th class="col-md-2 text-center">Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $key => $category)
							<tr>
								<td class="text-center">{{ ($key + 1) }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->description }}</td>


								<td class="td-actions d-flex justify-content-around">
									<a rel="tooltip" title="Ver" class="text-primary"><i class="fa fa-info"></i></a>
									<a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar" class="text-warning"><i class="fa fa-edit"></i></a>

									<form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
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
					<div> {{ $categories->links() }} </div>





				</div>
			</div>
		</div>

	</div>
</div>

@include('includes.footer')

@endsection
