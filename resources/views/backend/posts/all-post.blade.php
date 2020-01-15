@extends('layout.backend.app')
@section('my_title') Posts
@stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Posts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Posts </li>
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
                    <table class="table table-borderless table-hover">
                        @foreach($posts as $p)
                            <tr class="shadow">
                                <td></td>
                                <td>
                                    <div class="text-secondary text-sm">
                                        Item Name
                                    </div>
                                    <div>
                                        {{$p->item_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-secondary text-sm">
                                        Price
                                    </div>
                                    <div>
                                        {{$p->price}}
                                    </div>
                                </td>

                                <td>
                                    <div class="text-secondary text-sm">
                                        Description
                                    </div>
                                    <div>
                                        {{$p->dsc}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-secondary text-sm">
                                        Category Name
                                    </div>
                                    <div>
                                        {{$p->category->category_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-secondary text-sm">
                                        Post by
                                    </div>
                                    <div>
                                        {{$p->user->name}}
                                    </div>
                                    </td>
                                <td>
                                    <div class="text-secondary text-sm">
                                        Actions
                                    </div>
                                    <div>
                                        <a data-toggle="modal" data-target="#v{{$p->id}}" href="#" class="btn btn-sm btn-outline-success"><i class="fas fa-eye"></i> </a>
                                        <a href="{{route('post.edit',['id'=>$p->id])}}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> </a>
                                        <a data-toggle="modal" data-target="#d{{$p->id}}" href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-times-circle"></i> </a>
                                    </div>
                                    {{--start delete modal--}}
                                    <div id="d{{$p->id}}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center text-danger">
                                                    <p>The selected post ID "<storng>{{$p->id}}</storng>"</p> will drop from database.
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('post.delete',['id'=>$p->id])}}">Agree</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--end delete modal--}}
                                    {{--start detail modal--}}
                                    <div id="v{{$p->id}}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog  modal-lg"  role="document">
                                            <div class="modal-content">

                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div class="row">
                                                       <div class="col-sm-6">
                                                           @foreach($p->postimage as $img)
                                                               <img src="{{route('post.image',['img_name'=>$img->image])}}" class="img-thumbnail">
                                                               @endforeach
                                                       </div>
                                                            <div class="col-sm-6">
                                                                <p>
                                                                <div class="text-secondary text-sm">
                                                                    Item Name
                                                                </div>
                                                                <div>
                                                                    {{$p->item_name}}
                                                                </div>
                                                                </p>
                                                                <p>
                                                                <div class="text-secondary text-sm">
                                                                    Price
                                                                </div>
                                                                <div>
                                                                    {{$p->price}}
                                                                </div>
                                                                </p>
                                                                <p>
                                                                <div class="text-secondary text-sm">
                                                                    Description
                                                                </div>
                                                                <div>
                                                                    {{$p->dsc}}
                                                                </div>
                                                                </p>
                                                                <p>
                                                                <div class="text-secondary text-sm">
                                                                        Category Name
                                                                </div>
                                                                <div>
                                                                    {{$p->category->category_name}}
                                                                </div>
                                                                </p>
                                                                <p>
                                                                <div class="text-secondary text-sm">
                                                                    Post by
                                                                </div>
                                                                <div>
                                                                    {{$p->user->name}}
                                                                </div></p>
                                                                <p>
                                                                <div class="text-secondary text-sm">
                                                                    Date
                                                                </div>
                                                                <div>
                                                                    {{date('D(d) m/Y h:i A',strtotime($p->created_at))}}
                                                                </div>
                                                                </p>
                                                            </div>

                                            </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{--end detail modal--}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
@stop

