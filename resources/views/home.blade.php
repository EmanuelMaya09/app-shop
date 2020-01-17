@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">
  </div>
  <div class="main main-raised">
    <div class="container col-md-10">
      <div class="section">
        <h2 class="title  text-center">Dashboard</h2>
        @if (session('notification'))
            <div class="alert alert-success">
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
        @if(auth()->user()->cart->details->count()==0)
          <p>No tienes productos agregados a tu carrito</p>
        @endif
        @if(auth()->user()->cart->details->count()==1)
         <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} producto.</p>
         @endif
        @if(auth()->user()->cart->details->count()>1)
         <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>
         @endif
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th style="width: 20%">Nombre</th>             
              <th class="text-center">Precio</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Subtotal</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach (auth()->user()->cart->details as $detail)
            <tr>
              <td class="text-center">
                <img src="{{ $detail->product->featured_image_url }}" alt="" height="50">
              </td>
              <td>
                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
              </td>               
              <td class="text-center">$ {{ $detail->product->price }}</td>
              <td class="text-center">{{ $detail->quantity }}</td>
              <td class="text-center">$ {{ $detail->quantity * $detail->product->price }}</td>
              <td class="td-actions text-center">
                <form action="{{ url('/cart') }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                  <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                    <i class="material-icons">info</i>
                  </a>
                  <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                    <i class="material-icons">highlight_off</i>
                  </button>
                </form>
              </td>
            </tr>    
            @endforeach
          </tbody>
        </table>
        @if(auth()->user()->cart->details->count(0)>0)
        <form action="{{ url('/order') }}" method="post">
          {{ csrf_field() }}
          <div class="text-center">
            <button class="btn btn-primary btn-round">
              <i class="material-icons">done</i> Realizar pedido
            </button>
          </div>
        </form>
        @endif
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection