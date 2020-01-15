<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>


    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
                {{Auth::User()->name}}

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('profile')}}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media py-2">

                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Profile
                                <span class="float-right text-sm text-danger"><i class="fas fa-cog"></i></span>
                            </h3>

                        </div>
                    </div>

                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item dropdown-footer"><i class="fas fa-power-off"></i> Sign Out</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->


    </ul>
</nav>
