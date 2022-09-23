<style>
    .p a:hover {
        background-color: #6c757d !important;
    }

    .navbar a:hover {
        background-color: #6c757d;
    }
</style>


<div id="app">
    <nav class=" shadow-md navbar  fixed-top  navbar-expand-lg navbar-dark " style="background-color: #262b2f;text-shadow: 0px 13px 11px 3px rgba(158, 158, 158, 0.95);">
        <div class="container">
            <li>
                <a class="navbar-brand active" href="#">
                    <img src="{{ asset('../images/logo.png') }}" width="150px" height="auto" class="d-inline-block align-top " alt="">
                </a>
            </li>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="/">Home </a>
                    </li>

                    <li class="nav-item dropdown mr-3">
                        <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Kategori
                        </a>
                        <div class="p dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#262b2f">
                            <a class="dropdown-item " style="color:white" href="/produk_tshirt">T'shirt</a>
                            <a class=" dropdown-item" style="color:white" href="/produk_sweater">Crewneck</a>
                        </div>
                    </li>

                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="#">Review</a>
                    </li>
                    <form class="form-inline " action="/produk_search" method="GET">
                        <input style="margin-right:100px!important" class="form-control mr-5 col-lg-12" type="search" placeholder="Search" value="{{ old('cari') }}" name="cari">
                    </form>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto mr-3">
                    <!-- Authentication Links -->

                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="/wishlist"><i class="fa fa-heart " style="color:red"></i></a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="/cart"><i class="fa fa-cart-plus  "></i></a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color:#262b2f">

                            <a class="dropdown-item" href="/user" style="color:white"> My Profile </a>
                            <a style="color:white" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- 
<script>
    document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        document.getElementById('navbar_top').classList.add('fixed-top');
                        // add padding top to show content behind navbar
                        navbar_height = document.querySelector('.navbar').offsetHeight;
                        document.body.style.paddingTop = navbar_height + 'px';
                    } else {
                        document.getElementById('navbar_top').classList.remove('fixed-top');
                        // remove padding top from body
                        document.body.style.paddingTop = '0';
                    }
                }

            );
        }

    );
</script> -->