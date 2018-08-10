@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title text-center">Editar Producto</h2>
      <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre del producto</label>
              <input type="text"  class="form-control" name="name" value="{{ $product->name}}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Precio del Producto</label>
              <input type="number" step="0.01" class="form-control" name="price" value="{{ $product->price}}">
            </div>
          </div>
        </div>

        <div class="form-group label-floating">
          <label class="control-label">Descripcion corta</label>
          <input type="text"  class="form-control" name="description" value="{{ $product->description}}">
        </div>



        <textarea class="form-control" placeholder="Descripcion del producto" rows="5" name="long_description"> {{ $product->long_description}}</textarea>

        <button class="btn btn-primary">Guardar Cambios</button>

        <a href="{{ url('/admin/products') }}"" class="btn btn-default">Cancelar</a>





      </form>
    </div>
  </div>
</div>

@include('includes.footer')

@endsection
