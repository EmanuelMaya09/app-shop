@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'product-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">
  </div>
  <div class="main main-raised">
    <div class="container col-md-10">
      <div class="section">
        <h2 class="title  text-center">Editar categoría seleccionada</h2>
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Nombre de la categoría</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
              </div>
            </div>
          </div>
        <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description', $category->description) }}</textarea>
          <button class="btn btn-primary">Guardar cambios</button>
          <a href="/admin/categories" class="btn btn-default">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection