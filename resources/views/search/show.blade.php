@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('body-class', 'profile-page')

@section('styles')
  <style>
    .team{
      padding-bottom: 50px;
    }
    .team.row.col-md-4{
        margin-bottom: 5em;
      }
      .row{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
      }
      .row > [class*='col-']{
        display: flex;
        flex-direction: column;
      }
  </style>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="img/search.png" alt="Imágen una lupa que representa a la página de resultados" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Resultado de Búsqueda</h3>
              </div>
              @if (session('notification'))
                  <div class="alert alert-success">
                      {{ session('notification') }}
                  </div>
              @endif
              
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>Se encontraron {{ $products->count() }} resultados para el término {{ $query }} </p>
        </div>
        
        <div class="team text-center">
          <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">
                  <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{ $product->description }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="text-center">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@include('includes.footer')
@endsection