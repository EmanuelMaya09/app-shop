@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">
  </div>
  <div class="main main-raised">
    <div class="container col-md-10">
      <div class="section text-center">
        <h2 class="title">Listado de Categorías</h2>
        <div class="team">
          <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nuevo Categoría</a><br><br>
          <div class="row">          
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th style="width: 20%">Nombre</th>
                  <th style="width: 40%">Descripción</th>
                  <th class="text-center">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td class="text-center">{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->description }}</td>
                  <td class="td-actions text-center">
                    <form action="{{ url('/admin/categories/'.$category->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <a type="button" rel="tooltip" title="Ver Categoría" class="btn btn-info btn-simple btn-xs">
                        <i class="material-icons">info</i>
                      </a>
                      <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" type="button" rel="tooltip" title="Editar Categoría" class="btn btn-success btn-simple btn-xs">
                        <i class="material-icons">edit</i>
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
            @component('components.pagination')
              {{ $categories->links() }}
            @endcomponent           
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection