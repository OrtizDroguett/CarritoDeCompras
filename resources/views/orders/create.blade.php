@extends('layouts.app')
@section('content')

<h1> Detalle de orden</h1>  
<h4 class="text-center">Total: <strong>{{$cart->total}}</strong></h4>
<div class="text-center mb-3">
    <form action="{{route('orders.store')}}" method="POST" class="d-inline">
        @csrf
        @method("POST")
        <button type="submit" class="btn btn-success">
            Confirmar orden
        </button>
    </form>

</div>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-light">
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($cart->products as $product)
        <tr>
            <td><img src="{{asset($product->images->first()->path)}}" alt="" width="100">
                {{$product->title}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td><strong>${{$product->total}}</strong></td>
        </tr>
        @endforeach
        
    </tbody>
</table>
</div>

@endsection