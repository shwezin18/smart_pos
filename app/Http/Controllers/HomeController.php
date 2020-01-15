<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Post;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Auth;


class HomeController extends Controller
{
    public function postCheckout(Request $request){
        $this->validate($request,[
           'phone'=>'required|digits_between:9,13',
           'address'=>'required'
        ]);
        $od=new Order();
        $od->phone=$request['phone'];
        $od->address=$request['address'];
        $od->user_id=Auth::id();
        $od->user_orders=serialize(Session::get('cart'));
        $od->save();
        Session::forget('cart');;
        return redirect()->back()->with('info','The order have been chekout.');
    }
    public function getCleanCart(){

    Session::forget('cart');
    return redirect()->back();
}

    public function getDecreaseCart($id){
    $oldCart=Session::get('cart');
    $cart=new Cart($oldCart);
    $cart->decrease($id);
    if (count($cart->items)<1){
        Session::forget('cart');
    }else{
        Session::put('cart',$cart);
    }

    return redirect()->back();
}
    public function getIncreaseCart($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->increase($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getShoppingCart(Request $request){
        Session::put('cartUrl',$request->url());
        return view('cart');
    }
    public function getAddToCart($id){
        $post=Post::whereId($id)->firstOrFail();
        $oldCart=Session::has('cart') ? Session::get('cart') :null;
        $cart=new Cart($oldCart);
        $cart->add($post);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getPostImage($img_name){
        $file=Storage::disk('post_name')->get($img_name);
        return response($file);
    }
    public function getWelcome(){
        $cats=Category::get();
        $posts=Post::OrderBy('id','desc')->paginate("2");
        $slide_post=Post::OrderBy('id','desc')->first();
        return view('welcome')->with(['slide_post'=>$slide_post,'cats'=>$cats,'posts'=>$posts]);
    }
    public function getPostByCategory($id){
        $cats=Category::get();
        $posts=Post::where('category_id',$id)->OrderBy('id','desc')->paginate("2");
        $slide_post=Post::OrderBy('id','desc')->first();
        return view('welcome')->with(['slide_post'=>$slide_post,'cats'=>$cats,'posts'=>$posts]);
    }
    public function getPostSearch(Request $request){
        $q=$request['q'];
        $cats=Category::get();
        $posts=Post::where('item_name','LIKE',"%$q%")
            ->orWhere('price','LIKE',"%$q%")
            ->orWhere('created_at','LIKE',"%$q%")
            ->OrderBy('id','desc')->paginate("2");
        $slide_post=Post::OrderBy('id','desc')->first();
        return view('welcome')->with(['slide_post'=>$slide_post,'cats'=>$cats,'posts'=>$posts]);

    }
}
