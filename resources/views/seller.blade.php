@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('productSavedMsg')!= null)
        <div class="alert alert-success" role="alert">
            {{ session('productSavedMsg') }}
        </div>
        @endif

        @if (session('productSavedErrorMsg')!= null)
        <div class="alert alert-danger" role="alert">
            {{ session('productSavedErrorMsg') }}
        </div>
        @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>This is the seller page</h1>
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

        <div class="col-md-8">
            <a class="btn btn-md btn-outline-success btn-block mt-1" href="{{ route('addProduct')}}">Add Product</a>
        </div>

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                    List of Products
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">
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
                                        Original Price: {{ $product->prdt_oriPrice }} <br>
                                        Selling Price: {{ $product->prdt_sellPrice }} <br>
                                        Type: {{ $product->prdt_type}} <br>
                                        Quantity left: {{ $product->prdt_quantity}} <br>
                                        Last updated: {{ $product->updated_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
