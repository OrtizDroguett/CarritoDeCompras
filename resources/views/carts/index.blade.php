@extends('layouts.app')
@section('content')
    <h1>Tu carrito</h1>
    <h4 class="text-center">Total: <strong>{{$cart->total}}</strong></h4>
    @if(!isset($cart)|| $cart->products->isEmpty())
        <div class="alert alert-warning">
            Tu carrito está vacio
        </div>
    @else
    <a href="{{route('orders.create')}}" class="btn btn-success mb-3" > Empezar orden</a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection
