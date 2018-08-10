@extends('layouts.store')
@section('content')
    <div class="row">

        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="card">
                <div class="card-header">BIDS</div>
                <div class="card-body">
                    <p>Highest BID: R{{$highestBid}}</p>
                    <p>Average BID: R{{$averageBid}}</p>
                    @if(Session::has('success'))
                        <p>My BID: R{{Session::get('mybid')}}</p>
                    @endif
                </div>
            </div>
        </div>>

        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="card">
        <div class="card-header">
            <h4>Bid for {{$product->name}}</h4>
        </div>
        <div class="card-body">

            <form action="{{route('place',$product->id)}}" method="post" >
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-4 col-form-label text-md-right">Amount</label>

                    <div class="col-md-6">
                        <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}" required>

                        @if ($errors->has('amount'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Place Your BID') }}
                        </button>
                    </div>
                </div>


            </form>
        </div>
        </div>
    </div>
    </div>
@endsection