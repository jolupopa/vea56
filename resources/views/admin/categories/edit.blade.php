@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title text-center">Editar Categoria</h2>

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach( $errors->all() as $error)
          <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre de la categoria</label>
              <input type="text"  class="form-control" name="name" value="{{ old('name', $category->name) }}">
            </div>
          </div>
        </div>




        <textarea class="form-control" placeholder="Descripcion de la categoria" rows="5" name="description"> {{ old('description', $category->description) }}</textarea>

        <button class="btn btn-primary">Guardar Cambios</button>

        <a href="{{ url('/admin/categories') }}"" class="btn btn-default">Cancelar</a>





      </form>
    </div>
  </div>
</div>

@include('includes.footer')

@endsection
