@extends('layout.backend.app')
@section('my_title') Users
@stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop
@section('content_body')
    <div>
        <section class="content">
            <div class="container-fluid">
        <div class="col-sm-6">
        <form method="post" action="{{route('register')}}">
            <div class="form-group">
                <label for="name">User Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="name" id="name" name="name" class="form-control @if($errors->has('name'))is is-invalid @endif">
                    @if($errors->has('name')) <div class="invalid-feedback">{{$errors->first('name')}}</div> @endif
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <input type="email" id="email" name="email" class="form-control @if($errors->has('email'))is is-invalid @endif">
                    @if($errors->has('email')) <div class="invalid-feedback">{{$errors->first('email')}}</div> @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <input type="password" id="password" name="password" class="form-control  @if($errors->has('password'))is is-invalid @endif">
                    @if($errors->has('password')) <div class="invalid-feedback">{{$errors->first('password')}}</div> @endif
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control  @if($errors->has('confirm_password'))is is-invalid @endif">
                    @if($errors->has('confirm_password')) <div class="invalid-feedback">{{$errors->first('confirm_password')}}</div> @endif
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary btn-block">Save Change</button>
            </div>
            @csrf
        </form>
        </div>
            </div>
        </section>

    </div>
@stop
