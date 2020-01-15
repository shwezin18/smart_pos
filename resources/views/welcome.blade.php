@extends('layout.auth.app')
@section('my_title')
    Welcome
    @stop
@section('my_content')
    @include('partials.frontend.navbar')


    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form method="get" action="{{route('search.post')}}">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="search" name="q" class="form-control" required>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card shadow">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            @foreach($cats as $c)
                                <tr>
                                    <td><a href="{{route('post.category',['id'=>$c->id])}}" class="d-block">{{$c->category_name}}</a> </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <h3>Available items</h3>
                <div class="row">
                    <div class="col-12">
                        @foreach($posts as $p)
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                              {{-- @foreach($p->postimage as $img)
                                                    <div class="col-sm-6">
                                                        <img src="{{route('post.image.front',['img_name'=>$img->image])}}" class="img-thumbnail">
                                                    </div>
                                                    @endforeach
                                                    --}}
                                                <div class="col-sm-12">
                                                    <img src="{{route('post.image.front',['img_name'=>$p->first_postimage->first()->image])}}" class="img-thumbnail">

                                                </div>
                                                {!!  DNS1D::getBarcodeSVG($p->id, "C39"); !!}
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6 p-3">
                                                    <div class="text-secondary small">Item Name</div>
                                                    <div >{{$p->item_name}}</div>
                                                </div>
                                                <div class="col-sm-6 p-3">
                                                    <div class="text-secondary small">price</div>
                                                    <div >{{$p->price}}</div>
                                                </div>
                                                <div class="col-sm-6 p-3">
                                                    <div class="text-secondary small">Description</div>
                                                    <div >{{$p->dsc}}</div>
                                                </div>
                                                <div class="col-sm-6 p-3">
                                                    <div class="text-secondary small">Category Name</div>
                                                    <div >{{$p->category->category_name}}</div>
                                                </div>
                                                <div class="col-sm-6 p-3">
                                                    <div class="text-secondary small">Post By</div>
                                                    <div >{{$p->user->name}}</div>
                                                </div>
                                                <div class="col-sm-6 p-3">
                                                    <div class="text-secondary small">Date</div>
                                                    <div >{{date('D m/Y h:i A',strtotime($p->created_at))}}</div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#d{{$p->id}}" href="#" class="btn btn-outline-success"><i class="fas fa-eye"></i> Detail</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="{{route('add.to.cart',['id'=>$p->id])}}" class="btn btn-outline-primary"><i class="fas fa-cart-plus"></i> Add to cart </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--start detail modal--}}
                            <div id="d{{$p->id}}" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 row">
                                                    @foreach($p->postimage as $img)
                                                        <div class="col-sm-3">
                                                            <img class="img-thumbnail" src="{{route('post.image.front',['img_name'=>$img->image])}}">
                                                        </div>
                                                        @endforeach
                                                </div>
                                                    <div class="col-12 row">
                                                        <div class="col-sm-6 p-3">
                                                            <div class="text-secondary small">Item Name</div>
                                                            <div >{{$p->item_name}}</div>
                                                        </div>
                                                        <div class="col-sm-6 p-3">
                                                            <div class="text-secondary small">price</div>
                                                            <div >{{$p->price}}</div>
                                                        </div>
                                                        <div class="col-sm-6 p-3">
                                                            <div class="text-secondary small">Description</div>
                                                            <div >{{$p->dsc}}</div>
                                                        </div>
                                                        <div class="col-sm-6 p-3">
                                                            <div class="text-secondary small">Category Name</div>
                                                            <div >{{$p->category->category_name}}</div>
                                                        </div>
                                                        <div class="col-sm-6 p-3">
                                                            <div class="text-secondary small">Post By</div>
                                                            <div >{{$p->user->name}}</div>
                                                        </div>
                                                        <div class="col-sm-6 p-3">
                                                            <div class="text-secondary small">Date</div>
                                                            <div >{{date('D m/Y h:i A',strtotime($p->created_at))}}</div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <a data-toggle="modal" data-dismiss="modal" href="#" class="btn btn-outline-secondary"><i class="fas fa-times-circle"></i> Close</a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <a href="{{route('add.to.cart',['id'=>$p->id])}}" class="btn btn-outline-primary"><i class="fas fa-cart-plus"></i> Add to cart </a>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{--end detail modal--}}
                        @endforeach
                    </div>
                    {{$posts->links()}}
                </div>

            </div>
        </div>
    </div>

    @stop
