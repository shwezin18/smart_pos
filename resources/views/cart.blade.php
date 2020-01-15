@extends('layout.auth.app')
@section('my_title')
    Welcome
@stop
@section('my_content')
    @include('partials.frontend.navbar')
    <div class="container-fluid py-3">
        <div class="row">

            <div class="col-sm-6 ">
                <h4><i class="fas fa-shopping-bag"></i> Shopping Cart</h4>
                <div class="card shadow-sm">

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Items</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Amount</td>
                            </tr>
                            @if(Session::has('cart'))
                                @foreach(Session::get('cart')->items as $i)
                                    <tr>
                                        <td>{{$i['item']['item_name']}}</td>
                                        <td>{{$i['item']['price']}}</td>
                                        <td>
                                            <a href="{{route('decrease.cart',['id'=>$i['item']->id])}}"><i class="fas fa-minus-circle"></i> </a>
                                            {{$i['qty']}}
                                            <a href="{{route('increase.cart',['id'=>$i['item']->id])}}"><i class="fas fa-plus-circle"></i> </a>
                                        </td>
                                        <td>{{$i['amount']}}</td>
                                    </tr>
                                    @endforeach
                                <tr>
                                    <td colspan="3" class="text-right">
                                        Total Qty
                                    </td>
                                    <td>{{Session::get('cart')->totalQty}}</td>
                                </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">
                                            Total Amount
                                        </td>
                                        <td>{{Session::get('cart')->totalAmount}}</td>
                                    </tr>
                                @else
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center text-warning small">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            No shopping items.
                                        </div>
                                    </td>
                                </tr>
                                @endif
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{route('/')}}"><i class="fas fa-shopping-basket"></i> Continued Shopping</a>
                    <a href="{{route('clean.cart')}}" class="btn btn-link text-danger float-right"><i class="fas fa-times-circle"></i> Clean </a>
                </div>
            </div>
            <div class="col-sm-6">
                @if(Session::has('cart'))
                    <h5>Additional information.</h5>
                    <div class="card shadow">
                        <div class="card-body">
                            @if(Auth::User())
                                <form method="post" action="{{route('checkout')}}">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" id="phone" name="phone" class="form-control">
                                    </div>
                                    @if($errors->has('phone')) <span class="text-danger">{{$errors->first('phone')}}</span> @endif
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg">checkOut</button>
                                    </div>
                                    @csrf
                                </form>
                                @else
                                <p>
                                    Please signin <a href="{{route('login')}}">Here</a> to our website to continue.
                                </p>
                            @endif
                        </div>
                    </div>
                 @endif

            </div>
        </div>

    </div>

@stop

