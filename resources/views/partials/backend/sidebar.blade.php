<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('/')}}" class="brand-link">
        <img src="{{url('images/pos.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Smart POS </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
               <img src="@if(Auth::User()->profile_image)
               {{url('images/'.Auth::user()->profile_image)}}
               @else{{url('images/user.jpeg')}} @endif" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile')}}" class="d-block">   {{Auth::User()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->



                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users')}}" class="nav-link">
                                <i class="fas fa-user-alt"></i>
                                <p>All User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.new')}}" class="nav-link">
                                <i class="fas fa-user-plus"></i>
                                <p>Add User</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                            <spaKoKon class="badge badge-info right">3</spaKoKon>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories')}}" class="nav-link">
                                <i class="fas fa-list-alt"></i>
                                <p>categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('post.new')}}" class="nav-link">
                                <i class="fas fa-plus-circle"></i>
                                <p>Add posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('posts')}}" class="nav-link">
                                <i class="fas fa-tags"></i>
                                <p>All posts</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('order')}}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Orders

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            LogOut

                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

