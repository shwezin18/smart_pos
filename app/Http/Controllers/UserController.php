<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function allUsers(){
        $users=User::get();
        $roles=Role::get();
        return view('backend.Users.all')->with(['users'=>$users,'roles'=>$roles]);
    }
    public function newUsers(){
        return view('backend.Users.new');
}
public function deleteUser($id){
        $user=User::whereId($id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with('info',"The selected user have been deleted.");
}
public function updateUser(Request $request){
        $id=$request['id'];
        $role=$request['role'];
        $user=User::whereId($id)->firstOrFail();
        $user->syncRoles($role);
        return redirect()->back()->with("info",'The user have been updated.');
}
}
