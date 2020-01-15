<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <a class="navbar-brand" href="{{route('/')}}">Smart POS</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href=" {{route('shopping.cart')}}" class="nav-link">
                    <span class="btn btn-outline-warning">
                        <i class="fas fa-shopping-bag"></i>
                        {{Session::has('cart') ? Session::get('cart')->totalQty :"0"}}
                    </span>
                </a>
            </li>
            @if(Auth::User())
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                @else
                <li>
                    <a class="nav-link" href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i> SignIn
                    </a>
                </li>

                @endif


        </ul>

    </div>
</nav>
