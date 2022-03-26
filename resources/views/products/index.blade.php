@extends('layouts.app')
@section('content')
@empty($products)
<div class="alert alert-warning">
    La lista de productos está vacia
</div>
@else
<h1> Lista de productos</h1>
<a class="btn btn-success mb-3" href="{{route('products.create')}}">Agregar</a>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-light">
        <tr>
            <td>Id</td>
            <td>Tittle</td>
            <td>Description</td>
            <td>Price</td>
            <td>Stock</td>
            <td>Status</td>
            <td>Operaciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->status}}</td>
            <td><a class="btn btn-link" href="{{route('products.show',['product'=>$product->id])}}">Mostrar</a></td>
            <td><a class="btn btn-link" href="{{route('products.edit',['product'=>$product->id])}}">Editar</a></td>
            <td><form method="POST" action="{{route('products.destroy',['product'=>$product->id])}}">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-link">Eliminar</button>
            </form></td>
        </tr>
        @endforeach
        
    </tbody>
</table>
</div>
@endempty
@endsection
        
      
