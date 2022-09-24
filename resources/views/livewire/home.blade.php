@extends('layouts_user.app')
@include('layouts_user.slider')
<style>
    .card-box {
        border: 1px solid #ddd;
        padding: 20px;
        /* box-shadow: 0px 0px 10px 0px #c5c5c5; */
        /* margin-bottom: 30px; */
        /* float: left; */
        border-radius: 10px;
    }

    .card-box .card-thumbnail {
        max-height: 200px;
        overflow: hidden;
        border-radius: 10px;
        transition: 1s;
    }

    .card-box .card-thumbnail:hover {
        transform: scale(1.2);
    }

    .card-box h3 a {
        font-size: 20px;
        text-decoration: none;
    }

    /* ////// */

    .box-bg {
        background-color: #fff;
        /* padding: 15px 15px; */
        /* border: 2px solid #e2e2e2; */
        /* border-top-left-radius: 40px;
        border-bottom-right-radius: 40px; */
        position: relative;
        /* margin: 15px 0px; */
        overflow: hidden;
    }

    .social-links {
        width: 100%;
        position: absolute;
        top: -150px;
        left: 0px;
        background-color: rgba(0, 0, 0, 0.6);
        height: 30%;
        padding: 5px 0px;
        transition: 1s;
    }

    .box-bg:hover .social-links {
        top: 0px;
    }

    .social-links ul {
        padding: 0px;
        margin: 0px;
    }

    .social-links ul li {
        list-style: none;
        float: left;
        width: 100%;
    }

    .social-links ul li a {
        text-align: center;
        display: block;
        color: #607D8B;
        margin: 1% auto;
        text-decoration: none;
        color: white;
    }

    .social-links ul li a:hover {
        font-size: 20px;
        color: #6c757d;
    }

    .social-links h4 {
        color: #fff;
        /* padding-bottom: 15px; */
    }


    /* lllll */

    /* section.our-team {
        padding: 70px 0px;
        background-color: #f2f9ff;
        text-align: center;
        color: #fff;
    } */
    .member {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
        overflow: hidden;
        transition: 0.4s;
        /* border-radius: 100%;
        border: 6px solid #ffffff; */
    }

    /* .our-team h2 {
        font-size: 36px;
        color: #795548;
        font-weight: normal;
    }

    .our-team p {
        color: #9e9e9e;
        width: 70%;
        margin: 10px auto 10px;
    } */

    .member:hover {
        box-shadow: 0px 10px 0px 0px #6c757d;
    }

    .member .member-info {
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
        opacity: 0;
    }

    .member .member-detail {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 10px;
    }

    .member .social {
        position: absolute;
        left: 0;
        bottom: -38px;
        right: 0;
        height: 48px;
        transition: bottom ease-in-out 0.4s;
        text-align: center;
    }

    .member .social a {
        margin: 0 10px;
        display: inline-block;
        color: white;
    }

    .member .social a:hover {
        color: #6c757d;
        transform: scale(1.7);
    }



    .member .social i {
        font-size: 18px;
        margin: 0 2px;
    }

    .member:hover .member-info {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.83) 0%, rgba(0, 0, 0, 0.57) 20%, rgba(121, 85, 72, 0.09) 100%);
        opacity: 1;
        transition: 0.4s;
    }

    .member:hover .member-detail {
        bottom: 80px;
    }

    .member:hover .social {
        bottom: 10px;
    }

    .btn:hover {
        background-color: black;
    }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row mt-2 mb-2" style="margin:auto">
                    <h3><b>Kategori</b></h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="box-bg mb-3">
                            <!-- Bootstrap 5 card box -->
                            <div class="card-box text-center">
                                <div class="card-thumbnail">
                                    <img src="{{ asset('../images/profil.png') }}" style="margin:3%" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="social-links">
                                <ul>
                                    <li><a href="/produk_tshirt"><i class="fa-solid fa-shirt"></i> <br> <b>Tshirt</b></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <!-- Bootstrap 5 card box -->
                        <div class="box-bg">
                            <div class="card-box text-center">
                                <div class="card-thumbnail">
                                    <img src="{{ asset('../images/undip.jpg') }}" style="margin:3%" class="img-fluid" alt="https://www.michaels.com/gildan-mens-crewneck-sweatshirt/M20001446.html">
                                </div>
                            </div>
                            <div class="social-links">
                                <ul>
                                    <li><a href="/produk_sweater"><i class="fa-solid fa-mitten"></i><br><b>Crewneck</b></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-1 mb-2">
                <div class="  row mt-2 mb-2" style="margin:auto">
                    <h3><b>Rekomendasi</b></h3>
                </div>

                <div class="row justify-content-center m-1">
                    @foreach($produkpenjual as $m)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <!-- Bootstrap 5 card box -->
                        <div class="member mb-3">
                            <div class="card-box text-center border-0">
                                <div class="card-thumbnail">
                                    <img src="{{ url('/data_suplierproduk/'.$m->gambar) }}" style="margin:3%" class="img-fluid" alt="">
                                </div>
                                <!-- <div class="member-detail"> -->
                                <h5><a href="#" class="mt-2 text-active" style="text-decoration:none;color:black;">{{$m->nama}}</a></h5>
                                <p style="color:red">Rp {{$m->harga}}</p>
                                <!-- </div> -->
                                <div class="member-info">
                                    <div class="member-detail">
                                        <div class="social">
                                            <a href="#"><i class="fa fa-heart"></i></a>

                                            <form class="card__icon" action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="produkpenjual_id" value={{ $m->id }}>
                                                <button type="submit" class="  btn p-0">
                                                    <i class="fa fa-cart-plus"></i>
                                                </button>
                                            </form>

                                            <!-- <a href="/produk_detail/{{ $m->nama }}"><i class="fa fa-circle-info"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="form-group mb-2" style="margin:auto">
                    <button class="btn btn-secondary text-center"><a href="#" style="text-decoration:none; color:white;"> -->
                            Show more</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>