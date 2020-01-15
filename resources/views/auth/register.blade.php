@extends('layout.auth.app');

@section('my_title') SignUp @stop

@section('my_content')

    @include('partials.auth.message')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 my-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center text-success">Smart POS</h3>
                        <p class="text-secondary text-center mb-5">SignUp new user account.</p>
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
                                <button type="submit" class="btn btn-outline-primary btn-lg">logIn</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="my-4">
                    Already have an account?<a href="{{route('login')}}">SignIn</a>
                </div>

            </div>
        </div>
    </div>
@stop

