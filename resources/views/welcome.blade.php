@extends('layouts.app')
        
    @section('content')
    <div class="container-fluid">
        <div class="card py-2">
            <h1 class="text-center">Welcome to ZeShop</h1>

            @guest
            <h6 class="text-center">You are currently logged in as Guest</h6>
            @endguest
        </div>

        <div class="card mt-1">
            <div class="card-header">
                List of Products
            </div>

            <div class="card-body">
                <div class="row">
                    @foreach($products as $product)
                    @if($product->prdt_available == 1)
                    <div class="col-md-3">
                        <div class="card" >
                            <img src="https://as1.ftcdn.net/jpg/02/44/83/32/500_F_244833214_bBmRijbyEmtKrm7Q5zdcMc4ks3tpTmVu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product->prdt_name }}
                                </h5>
                                <div class="card-subtitle mb-0 text-muted">
                                    @if ($product->prdt_available == 1)
                                        <p class="text-success">Available</p>
                                    @else
                                        <p class="text-danger">Unavailable</p>
                                    @endif
                                </div>
                                <p class="card-text">
                                    Price: {{ $product->prdt_sellPrice }} <br>
                                    Type: {{ $product->prdt_type}} <br>
                                    Quantity left: {{ $product->prdt_quantity}} <br>
                                    Description: {{ $product->prdt_description}}
                                </p>

                                @guest
                                <div class="text-right">
                                    <button href="#" class="btn btn-md btn-outline-primary" disabled>Login to add to Cart</button>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>    
    </div>
    @endsection

