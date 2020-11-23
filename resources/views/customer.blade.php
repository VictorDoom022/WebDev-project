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
                    <button onclick="redirectCart()" type="button" class="btn btn-primary btn-sm">
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
                      
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <p>Price:</p>
                                        <p id="prdt_sellPrice">{{ $product->prdt_sellPrice }}</p>
                                    </div>
                                    <div class="col-md-12 d-flex">
                                        <p>Type:</p>
                                        <p id="prdt_type">{{ $product->prdt_type }}</p>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <p>Quantity left:</p>
                                        <p id="prdt_quantity">{{ $product->prdt_quantity }}</p>
                                    </div>
                                    <div class="col-md-12 d-flex">
                                        <p>Description:</p>
                                        <p id="prdt_description">{{ $product->prdt_description }}</p>
                                    </div>
                                </div>                            

                                <div class="text-right">
                                    <button onclick="addChart({{ $product->id }}, {{ $product->prdt_quantity }})" id="addCartButton_{{ $product->id }}" value="{{ $product->id }}" class="btn btn-md btn-outline-primary">Add to Cart</button>
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
    count = 0;
    var chartItems = [];
    function addChart(id, prdt_quantity){
        
        if(prdt_quantity > 1){
            var addCartDate = new Date();
            var date = addCartDate.getFullYear() + '/' + addCartDate.getMonth() + '/' +addCartDate.getDate() + '-' + addCartDate.getHours() + ':' + addCartDate.getMinutes();
            count++;
            var productChartDetails = {
                prdt_id : id,
                addCartDate : date
            };
            chartItems.push(productChartDetails);
        }else{
            addCartButton = document.getElementById('addCartButton_'+id);
            addCartButton.disabled = true;
        }
        console.log(chartItems);
        cartLogoNum = document.getElementById("cartNum");
        cartLogoNum.innerHTML = count;
 
    }

    function redirectCart(){
        console.log(chartItems);
        if (chartItems.length !=0) {
            let Cartdata = JSON.stringify(chartItems);
            
            $.ajax({
                url: "/customer/viewCart",
                type: "POST",
                data: { cartData:Cartdata, _token: '{{csrf_token()}}'},
                success: function(response){
                    console.log("success");
                    window.location.href = "/customer/viewCart";
                }
            }
           );
        }
    }
    
</script>
@endsection
