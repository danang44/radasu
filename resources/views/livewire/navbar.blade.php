<style>
    .p a:hover {
        background-color: #6c757d !important;
    }

    .navbar a:hover {
        background-color: #6c757d;
        color: #31b2c3;
    }

    a {
        color: #2A679F;
    }

    /*========*/
    .form-wrapper {
        text-align: center;

    }


    .form-wrapper #search {
        border: 1px solid #CCC;
        -webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
        -moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
        box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color: #999;
        float: left;


        width: 320px;
    }

    .form-wrapper #search:focus {
        border-color: #aaa;
        -webkit-box-shadow: 0 1px 1px #bbb inset;
        -moz-box-shadow: 0 1px 1px #bbb inset;
        box-shadow: 0 1px 1px #bbb inset;
        outline: 0;
    }


    .form-wrapper #submit {
        background-color: #0483a0;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
        background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
        background-image: linear-gradient(top, #31b2c3, #0483a0);
        border: 2px solid #00748f;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;

        color: #fafafa;
        cursor: pointer;

        float: left;

        padding: 0;

        text-shadow: 0 1px 0 rgba(0, 0, 0, .3);
        width: 50px;
    }

    .form-wrapper #submit:hover,
    .form-wrapper #submit:focus {
        background-color: #31b2c3;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
        background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
        background-image: linear-gradient(top, #0483a0, #31b2c3);
    }

    .form-wrapper #submit:active {
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        outline: 0;
    }

    .form-wrapper #submit::-moz-focus-inner {
        border: 0;
    }

    .badge {
        background: white;
        color: red;
        width: auto;
        height: auto;
        margin: 0;
        border-radius: 50%;
        position: absolute;
    }

    /* /// */

    .dropdown {
        display: inline-block;
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: grey;
        min-width: 160px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-btn {
        background-color: green;
        padding: 10px;
        font-size: 15px;
        color: white;
        border: none;
    }

    .dropdown-content a {
        display: block;
        padding: 10px;
        color: white;
        text-decoration: none;
        font-size: 16px;
    }

    .dropdown-content a:hover {
        background-color: lightgrey;
        color: green;
    }
</style>



<div id="app">
    <nav class=" shadow-md navbar fixed-top navbar-expand-md navbar-dark" style="background-color: black;text-shadow: 0px 13px 11px 3px rgba(158, 158, 158, 0.95);">

        <div class="container ml-0 mr-0">
            <span class="navbar-brand mb-0 ">
                <img src="{{ asset('../images/logo.png') }}" width="150px" height="auto" class="d-inline-block align-left" alt="">
            </span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ">
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="/">Home </a>
                    </li>



                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="">About</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="">Review</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto d-flex justify-content-end">
                    <li class="nav-item active m-2" style=" margin-top: auto;margin-bottom: auto;">
                        <a class="nav-link" href=""><i class="fa fa-heart " style="color:red"></i>
                            <span class="badge"></span></a>
                    </li>
                    <li class="nav-item active m-2" style=" margin-top: auto;margin-bottom: auto;">
                        <a class="nav-link" href=""><i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge">{{ $jumlah_pesanan }}</span></a>
                    </li>

                    @guest
                    <li class="nav-item " style=" margin-top: auto;margin-bottom: auto;">
                        <a class="nav-link active" href="{{ route('login') }}" data-toggle="modal" data-target="#modal-tabbed">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item" style=" margin-top: auto;margin-bottom: auto;">
                        <a class="nav-link active" href="{{ route('register') }}" data-toggle="modal" data-target="#modal-tabbeds">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown" style=" margin-top: auto;margin-bottom: auto;">
                        <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color:black">

                            <a class="dropdown-item" href="/pengguna" style="color:white;font-size:13px"> My Profile </a>
                            <a class="dropdown-item" href="/transaksi" style="color:white;font-size:13px"> Riwayat Transaksi</a>
                            <a style="color:white;font-size:13px" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    </nav>
</div>
</div>


<div id="modal-tabbed" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Form -->
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <ul class="nav nav-tabs nav-justified alpha-grey mb-0">
                    <li style="background-color:#e9ecef;color:black" class="nav-item">
                        <h6 class="my-1 pt-2 pb-2">Log in</h6>
                        </a>
                    </li>
                </ul>

                <div class="tab-content modal-body">
                    <div class="tab-pane fade show active" id="login-tab1">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Login to your account</h5>

                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-input-styled" data-fouc>
                                    Remember
                                </label>
                            </div>

                            <a href="login_password_recover.html" class="ml-auto">Forgot password?</a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>


                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Belum punya akun?</span>
                            <br><span class="px-2">Silahkan ke menu register</span>
                        </div>

                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
    </div>
</div>
<!-- /tabbed recovery form -->


<div id="modal-tabbeds" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Form -->
            <form class="login-form " method="POST" action="{{ route('register') }}">
                @csrf
                <ul class="nav nav-tabs nav-justified alpha-grey mb-0">
                    <li style="background-color:#e9ecef;color:black" class="nav-item">
                        <h6 class="my-1 pt-2 pb-2">Register</h6>
                    </li>
                </ul>
                <div class="tab-content modal-body">
                    <div class="tab-pane fade show active" id="login-tab2">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Create New account</h5>
                            <br>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama" />
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" />
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group text-center text-muted content-divider">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" />
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password" />
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Register
                            </button>
                        </div>


                    </div>
                </div>
            </form>
            <!-- /form -->

        </div>
    </div>
</div>
<!-- /tabbed recovery form -->