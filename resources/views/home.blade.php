@extends('layouts.app')

@section('title', 'Dashboard')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title text-center">Dashboard</h2>

      @if (session('notification'))
      <div class="alert alert-success" role="alert">
        {{ session('notification') }}
      </div>
      @endif

      <ul class="nav nav-pills nav-pills-icons" role="tablist">
    <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
      -->
      <li class="nav-item">
        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
          <i class="material-icons">dashboard</i>
          Carrito de compras
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
          <i class="material-icons">list</i>
          Pedidos realizados
        </a>
      </li>
    </ul>
    <hr>
    <p>Cantidad de elementos en tu carrito de compras = {{ auth()->user()->cart->details->count() }}</p>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">Imagen</th>
          <th class="col-md-2 text-center">Nombre</th>


          <th class="text-right">Precio</th>
          <th class="text-right">Cantidad</th>
          <th class="text-right">SubTotal</th>
          <th class="col-md-2 text-center">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach (auth()->user()->cart->details as $detail)
        <tr>
          <td class="text-center">
            <img src="{{ $detail->product->featured_image_url }}" height="50">
          </td>
          <td>
            <a href="{{ url('/products/'. $detail->product->id )}}" target="_blank">{{ $detail->product->name }}</a>
          </td>


          <td class="text-right">S/ {{ $detail->product->price }}</td>
          <td class="text-right"> {{ $detail->quantity }}</td>
          <td class="text-right">S/ {{ $detail->quantity * $detail->product->price}}</td>

          <td class="td-actions d-flex justify-content-around">
            <a href="{{ url('/products/'. $detail->product->id )}}" target="_blank" rel="tooltip" title="Ver" class="text-primary"><i class="fa fa-info"></i></a>


            <form method="post" action="{{ url('/cart') }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="hidden" name="cart_id" value=" {{ $detail->cart_id }}">

              {{-- equivalente al method_field(DELETE) = <input type="hidden" name="_method" value="DELETE"> --}}
              <button type="submit" rel="tooltip" title="Eliminar" class="text-danger"><i class="fa fa-times"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="text-center">
      <form method="post" action="{{ url('/order')}}">
        {{ csrf_field()}}
        <input type="hidden" name="$cart_id" value="{{}}">
        <button class="btn btn-primary btn-round">
          <i class="material-icons">done</i>
          Hacer pedido
        </button>
      </form>
    </div>
  </div>
</div>
</div>

@include('includes.footer')

@endsection
