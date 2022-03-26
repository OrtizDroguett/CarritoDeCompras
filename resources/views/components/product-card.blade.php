                   <div class="card">
                        <img class="card-img-top" src="{{asset($product->images->first()->path)}}" alt="" height="500">
                        <div class="card-body">
                            <h4 class="text-right"><strong>${{ $product->price }}</strong></h4>
                            <h5  class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text">Quedan {{$product->stock}}</p>
                            @if (isset($cart))
                            <p class="card-text">
                                {{$product->pivot->quantity}} en tu carro (${{$product->total}})
                            </p>
                                <!-- Eliminar del carrito-->
                            <form action="{{route('products.carts.destroy',['cart'=>$cart->id, 'product'=>$product->id])}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-warning">
                                    Eliminar del carrito
                                </button>
                                </form>
                                @else
                                <!-- Añadir al carrito-->
                                <form action="{{route('products.carts.store',['product'=>$product->id])}}" method="POST" class="d-inline">
                                    @csrf
                                    @method("POST")
                                    <button type="submit" class="btn btn-success">
                                        Añadir al carrito
                                    </button>
                                </form>
                                @endif
                        </div>
                   </div>
