@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'product-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">
  </div>
  <div class="main main-raised">
    <div class="container col-md-10">
      <div class="section">
        <h2 class="title  text-center">Editar producto seleccionado</h2>
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Nombre del producto</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Precio del producto</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}">
              </div>
            </div>
          </div>
          <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Descripción corta</label>
            <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
          </div>
        <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old('long_description', $product->long_description) }}</textarea>
          <button class="btn btn-primary">Guardar cambios</button>
          <a href="/admin/products" class="btn btn-default">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection