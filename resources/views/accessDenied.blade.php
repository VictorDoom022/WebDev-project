@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pt-1">
                <h1 class="text-center font-weight-bold pb-2">Access Denied !</h1>

                <h4 class="text-center font-weight-lighter">{{ Auth::user()->position }} is not allowed to access this page!</h4>
            </div>
        </div>
    </div>
</div>
@endsection