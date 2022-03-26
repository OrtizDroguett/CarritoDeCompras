@extends('layouts.app')
@section('content')

<h1> Detalle de Pago</h1>  
<h4 class="text-center">Total: <strong>{{$order->total}}</strong></h4>
<div class="text-center mb-3">
    <form action="{{route('orders.payments.store',['order'=>$order->id])}}" method="POST" class="d-inline">
        @csrf
        @method("POST")
        <button type="submit" class="btn btn-success">
            Pagar
        </button>
    </form>

</div>


@endsection