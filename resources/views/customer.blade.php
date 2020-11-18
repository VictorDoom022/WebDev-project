@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>This is the customer page</h1>
                    <h3>Welcome, {{ Auth::user()->name }}</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                    List of Products
                    <button type="button" class="btn btn-primary btn-sm">
                        Cart <span id="cartNum" class="badge badge-light">0</span>
                    </button>
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

                                <div class="text-right">
                                    <button onclick="addChart(this.value)" id="cartButton" value="{{ $product->id }}" class="btn btn-md btn-outline-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addChart(id){
        count = 0;
        count++;
        cartLogoNum = document.getElementById("cartNum");
        cartLogoNum.innerHTML = count;
    }
</script>
@endsection
