@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/profile_city.jpg') }}');">
  </div>
  <div class="main main-raised">
    <div class="container col-md-10">
      <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>
        <div class="team">
          <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a><br><br>
          <div class="row">          
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th style="width: 20%">Nombre</th>
                  <th style="width: 40%">Descripción</th>
                  <th>Categoría</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td class="text-center">{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                  <td class="text-center">&euro; {{ $product->price }}</td>
                  <td class="td-actions text-center">
                    <form action="{{ url('/admin/products/'.$product->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <a type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                        <i class="material-icons">info</i>
                      </a>
                      <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" type="button" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" type="button" rel="tooltip" title="Imágenes del producto" class="btn btn-warning btn-simple btn-xs">
                        <i class="material-icons">image</i>
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
            <nav aria-label="Page navigation example">
              {{ $products->links() }}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection