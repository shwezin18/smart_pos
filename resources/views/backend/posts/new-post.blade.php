
@extends('layout.backend.app')
@section('my_title') Add post
@stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop
@section('content_body')
        <section class="content">
            <div class="container-fluid">
                <div class="row pl-4">
                    <div >
                        <form enctype="multipart/form-data" method="post" action="{{route('post.new')}}">
                            @csrf
                            <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="image">Image</label>
                                <input type="file" name="image[]" multiple class="form-control-file @if($errors->has('image')) is-invalid @endif" id="image">
                                @if($errors->has('image'))<span class="invalid-feedback">{{$errors->first('image')}}</span> @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="item_name">Item_name</label>
                                <input type="text" name="item_name" id="item_name" class="form-control @if($errors->has('item_name')) is-invalid @endif ">
                                @if($errors->has('item_name'))<span class="invalid-feedback">{{$errors->first('item_name')}}</span> @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control @if($errors->has('price')) is-invalid @endif">
                                @if($errors->has('price'))<span class="invalid-feedback">{{$errors->first('price')}}</span> @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="category">Categories</label>
                                <select id="category" name="category" class="custom-select @if($errors->has('category')) is-invalid @endif">
                                    @foreach($cats as $c)
                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                        @endforeach
                                </select>
                                @if($errors->has('category'))<span class="invalid-feedback">{{$errors->first('category')}}</span> @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                            </div>

                            </div>

                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Save</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
        </section>


@stop
