<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getFilterOrder(Request $request){
        $f=$request['fDate'];
        $fDate=date('Y-m-d',strtotime($f));
        $s=$request['sDate'];
        $sDate=date('Y-m-d',strtotime($s));
        $orders=Order::whereDate('created_at','>=',$fDate)
            ->whereDate('created_at','<=',$sDate)
        ->OrderBy('id','desc')->get();
        $orders->transform(function ($order){
            $order->user_orders=unserialize($order->user_orders);
            return $order;
        });
        return view('backend.orders')->with(['orders'=>$orders]);

    }
    public function getOrder(){
        $today=date('Y-m-d');
        $orders=Order::where('created_at','LIKE',"%$today%")->OrderBy('id','desc')->get();
        $orders->transform(function ($order){
            $order->user_orders=unserialize($order->user_orders);
            return $order;
        });
        return view('backend.orders')->with(['orders'=>$orders]);
    }
}
