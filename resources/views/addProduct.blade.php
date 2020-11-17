@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Add Product
                </div>
                <form action="/seller/addProduct" method="POST">  
                @csrf  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                Product Code
                                <input class="form-control form-control-sm" type="text" name="prdt_code">
                            </div>
                            <div class="col-md-6">
                                Product Name
                                <input class="form-control form-control-sm" type="text" name="prdt_name">
                            </div>
                            <div class="col-md-6">
                                Original Price (per unit)
                                <input class="form-control form-control-sm" type="text" name="prdt_oriPrice">
                            </div>
                            <div class="col-md-6">
                                Selling Price (per unit)
                                <input class="form-control form-control-sm" type="text" name="prdt_sellPrice">
                            </div>
                            <div class="col-md-6">
                                Product Type
                                <select class="form-control form-control-sm"name="prdt_type">
                                    <option value="fan">Fan</option>
                                    <option value="tv">TV</option>
                                    <option value="light">Light</option>
                                    <option value="tvBox">TV Box</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                Quantity
                                <input class="form-control form-control-sm" type="number" name="prdt_quantity">
                            </div>
                            <div class="col-md-6">
                                Product Image
                                <input class="form-control form-control-sm" type="file" name="prdt_image">
                            </div>
                            <div class="col-md-12">
                                Description
                                <textarea class="form-control form-control-sm" name="prdt_desc" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection