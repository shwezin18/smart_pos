@extends('layout.backend.app')
@section('my_title') Profile
@stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop
@section('content_body')
   <div class="row">
       <div class="col-sm-8">
           <div class="card">
               <div class="card-header">User Information</div>
               <div class="col-4">
               <img class="card-img-top" src="@if(Auth::User()->profile_image)
               {{url('images/'.Auth::user()->profile_image)}}
               @else{{url('images/user.jpeg')}} @endif">
               </div>
               <div class="card-body">
                   <p>
                       <i class="fas fa-user-circle"></i>Username: <span class="text-bold">{{Auth::User()->name}}</span>
                   </p>
                   <p>
                       <i class="fas fa-envelope"></i>Email: <span class="text-bold">{{Auth::user()->email}}</span>
                   </p>
                   <p>
                       <i class="fas fa-star-of-life"></i>Role: <span class="text-bold">{{Auth::user()->roles()->first()->name}}</span>

                   </p>
                   <p>
                       <i class="fas fa-calendar-alt"></i>Member Since: <span class="text-bold">{{Auth::User()->created_at->diffForHumans()}}</span>
                   </p>
               </div>
           </div>
       </div>
       <div class="col-sm-4">
           <form enctype="multipart/form-data" method="post" action="{{route('profile/upload')}}">
           <div class="form-group">
               @if($errors->has('profile_image'))<div class="text-danger">{{$errors->first('profile_image')}}</div> @endif
               <label for="profile_image">Profile Image</label>
               <input type="file" name="profile_image" id="profile_image" class="form-control-file">
           </div>
           <div class="form-group">
               <button type="submit" class="btn btn-outline-primary">Upload</button>
           </div>
               @csrf
           </form>
       </div>
   </div>
@stop

