<?php

namespace App\Http\Controllers;
use App\User;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\EventListener\SessionListener;

class AuthController extends Controller
{
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function getLogin(){
        return view("auth.login");
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'name'=>'required|exists:users',
            'password'=>'required'
        ]);
        $name=$request['name'];
        $password=$request['password'];

        if (Auth::attempt(['name'=>$name,'password'=>$password])){

            $oldurl=Session::has('cartUrl') ? Session::get('cartUrl') : null;
            if($oldurl){
                Session::forget('cartUrl');
                return redirect($oldurl);
            }else{
                return redirect()->route('dashboard');
            }

        }else{
            return redirect()->back()->with('error',"Authentication failed.");
        }
    }
    public function getRegister(){
        return view("auth.register");
    }
    public function postRegister(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ]);
        $user=new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=bcrypt($request['password']);
        $user->save();
        $user->syncRoles("Standard");
        return redirect()->back()->with('info','The user have been created.');
    }
}
