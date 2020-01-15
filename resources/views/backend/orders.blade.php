@extends('layout.backend.app')
@section('my_title') Orders
@stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop
@section('content_body')
   <section class="content pb-5">
       <div class="container-fluid">
           <form method="get" action="{{route('filter.order')}}">
               <div class="row">
                   <div class="form-group col-sm-3">
                       <div class="input-group">
                           <div class="input-group-prepend">
                               <div class="input-group-text">Start Date</div>
                           </div>
                               <input type="date" name="fDate" class="form-control" required>
                       </div>
                   </div>
                   <div class="form-group col-sm-3">
                       <div class="input-group">
                           <div class="input-group-prepend">
                               <div class="input-group-text">Start Date</div>
                           </div>
                               <input type="date" name="sDate" class="form-control" required>
                       </div>

                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-outline-primary">Filter</button>
                   </div>
               </div>
           </form>

           <div class="accordion" id="accordionExample">
               @foreach($orders as $od)
                   <div class="card">
                       <div class="card-header" id="headingThree">
                           <h2 class="mb-0">
                               <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#c{{$od->id}}" aria-expanded="false" aria-controls="collapseThree">
                                Order ID : {{$od->id}}
                               </button>
                           </h2>
                       </div>
                       <div id="c{{$od->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-sm-4 small border-right">
                                       <p>
                                           <i class="fas fa-user"></i>
                                           Name : {{ $od->user->name }}
                                       </p>
                                       <p>
                                           <i class="fas fa-envelope"></i>
                                           Eamil : {{ $od->user->email }}
                                       </p>
                                       <p>
                                           <i class="fas fa-phone"></i>
                                          Phone : <a href="tel:{{$od->phone}}"> {{ $od->phone }} </a>
                                       </p>
                                       <p>
                                           <i class="fas fa-calendar-day"></i>
                                          Date: {{ date('D(d) m/Y h:i A',strtotime($od->created_at)) }}
                                       </p>
                                   </div>
                                   <div class="col-sm-8">
                                       <table class="table table-borderless small">
                                           <tr>
                                               <th>Items</th>
                                               <th>Price</th>
                                               <th>Qty</th>
                                               <th>Amount</th>
                                           </tr>
                                           @foreach($od->user_orders->items as $i)
                                               <tr>
                                                   <td>{{$i['item']['item_name']}}</td>
                                                   <td>{{$i['item']['price']}}</td>
                                                   <td>
                                                       {{$i['qty']}}
                                                   </td>
                                                   <td>{{$i['amount']}}</td>
                                               </tr>
                                           @endforeach
                                               <tr>
                                                   <td colspan="3" class="text-right">
                                                       Total Qty
                                                   </td>
                                                   <td>{{$od->user_orders->totalQty}}</td>
                                               </tr>
                                               <tr>
                                                   <td colspan="3" class="text-right">
                                                       Total Amount
                                                   </td>
                                                   <td>{{$od->user_orders->totalAmount}}</td>
                                               </tr>

                                       </table>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
           </div>
               @endforeach
       </div>
   </section>
@stop

