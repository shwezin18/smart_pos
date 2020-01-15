@extends('layout.backend.app')
@section('my_title') Categories
@stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">categories </li>
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
                <div class="row">

                    <div class="col-sm-4">
                        <form method="post" action="{{route('category.new')}}">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control  @if($errors->has('category_name'))is is-invalid @endif">
                            @if($errors->has('category_name')) <div class="invalid-feedback">{{$errors->first('category_name')}}</div> @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>
                    @csrf
                    </form>
                    </div>
                    <div class="col-sm-8">
                        <div class="card shadow">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <th>Categories Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($cats as $c)
                                        <tr>
                                            <th>{{$c->category_name}}</th>
                                            <th>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i>
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a data-toggle="modal" data-target="#e{{$c->id}}" class="dropdown-item text-info" href="#"><i class="fas fa-edit"></i> Edit </a>
                                                        <a data-toggle="modal" data-target="#d{{$c->id}}" class="dropdown-item text-danger" href="#"><i class="fas fa-times-circle"></i> Drop </a>

                                                    </div>
                                                </div>
                                                {{--start edit modal--}}
                                                <div id="e{{$c->id}}" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="post" action="{{route('category.update')}}">
                                                                <input type="hidden" name="id" value="{{$c->id}}">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center text-bold">Change Category</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body ">
                                                                    <div class="form-group">
                                                                        <label for="category_name">Category Name</label>
                                                                        <input type="text" id="category_name" name="category_name" class="form-control" value="{{$c->category_name}}">

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
                                                {{--start delete modal--}}
                                                <div id="d{{$c->id}}" class="modal fade" tabindex="-1" role="dialog">
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
                                                                <p>The selected category will remove from your database.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{route('category.remove',['id'=>$c->id])}}">Agree</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--end delete modal--}}
                                            </th>
                                        </tr>
                                        @endforeach
                                </table>
                                {{$cats->links()}}
                            </div>
                        </div>


                </div>

            </div>
            </div>
        </section>
    </div>


                @stop
