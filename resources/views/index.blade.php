@extends('layouts.frontend')
@section('content')
    <div class="row">

        @foreach($products as $product)
        <div class="col-md-4">

                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{asset('images/default.jpg')}}" style="height: 200px;" alt="Card image cap">
                    <h4 class="text-center">
                        {{$product->name}} R {{$product->price}}
                    </h4>
                    <div class="card-body">
                        <p class="card-text">
                            {{$product->description}}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('bids',$product->id)}}" class="btn btn-sm btn-outline-secondary">Bid</a>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
@endsection