@extends('layout.backend.app')
@section('my_title') Dashboard
    @stop
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @stop
@section('content_body')
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{count($posts)}}<sup style="font-size: 20px">items</sup></h3>

                    <p>Products</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-tags"></i>
                 </div>
                <a href="{{route('posts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{count($cats)}}</h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <a href="{{route('categories')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{count($users)}}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <a href="{{route('users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{count($orders)}}</h3>

                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="{{route('order')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        </div>
    </section>
    @stop
