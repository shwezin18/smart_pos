<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class AdminController extends Controller
{
    public function getDashboard(){
        $posts=Post::get();
        $cats=Category::get();
        $users=User::get();
        $today=date('Y-m-d');
        $orders=Order::whereDate('created_at',$today)->get();

        return view("backend.Dashboard")->with(['posts'=>$posts,'cats'=>$cats,'users'=>$users,'orders'=>$orders]);
    }
    public function getProfile(){
        return view('backend.profile');
    }
    public function postUpload(Request $request){
        $this->validate($request,[
            'profile_image'=>'required|mimes:jpg,png,jpeg,gif'
        ]);
        $image_file=$request->file('profile_image');
        $image_name=date('dmyhis').'.'.$image_file->getClientOriginalExtension();

        Storage::disk('myProfile')->put($image_name,File::get($image_file));

        $user=User::whereId(Auth::User()->id)->firstOrFail();
        $user->profile_image=$image_name;
        $user->update();
        return redirect()->back();
    }
}
