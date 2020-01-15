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
    <div >
        <section class="content">
            <div class="container-fluid">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Member Since</th>
                        <th>Actions</th>
                    </tr>

                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->roles()->first()->name}}</td>
                                <td>{{date('D m/Y h:i A',strtotime($u->created_at))}}</td>
                                <td>
                                    @if(Auth::User()->email != $u->email)
                                    <a href="#" data-toggle="modal" data-target="#e{{$u->id}}" class="btn btn-outline-info"><i class="fas fa-user-edit"></i> </a>
                                        {{--start edit modal--}}
                                        <div id="e{{$u->id}}" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{route('user.update')}}">
                                                        <input type="hidden" name="id" value="{{$u->id}}">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center text-bold">Change Role for "<b>{{$u->name}}</b></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="role">Role</label>
                                                            <select name="role" id="role" class="custom-select">
                                                                @foreach($roles as $r)
                                                                    <option>{{$r->name}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-primary">Save Change</button>
                                                        </div>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{--end edit modal--}}
                                    <a href="#" data-toggle="modal" data-target="#d{{$u->id}}" class="btn btn-outline-danger"><i class="fas fa-times-circle"></i> </a>
                                    {{--start delete modal--}}
                                    <div id="d{{$u->id}}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center text-bold">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center text-danger">
                                                    <i class="fas fa-exclamation-triangle fa-3x"></i>
                                                    <p>The selected user will remove from your database.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('user.delete',['id'=>$u->id])}}">Agree</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--end delete modal--}}
                                        @endif
                                </td>
                            </tr>

                            @endforeach

                </table>
            </div>
        </section>

    </div>
@stop


