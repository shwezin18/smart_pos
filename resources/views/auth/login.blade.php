@extends('layout.auth.app');

@section('my_title') SignIn @stop

@section('my_content')
    @include('partials.auth.message')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center text-success">Smart POS</h3>
                        <p class="text-secondary text-center mb-5">SignIn to continue your session..</p>
                        <form method="post" action="{{route('login')}}">
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
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </div>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control  @if($errors->has('password')) is-invalid @endif">
                                    @if($errors->has('password')) <div class="invalid-feedback">{{$errors->first('password')}}</div> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">SignIn</button>
                            </div>
                            @csrf
                        </form>
                        Don't have an account?<a href="{{'register'}}">SignUp</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @stop
