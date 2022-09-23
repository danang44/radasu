@extends('master.penjual_layout')


@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SEWAIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>
</head>

<body>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SEWAIN.COM</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p align="center" style="font-weight: bold">Halo Seller SEWAIN,
                        Persetujuan perjanjian kontrak.</p>
                    <p>
                    <ol class=”latin_besar”>
                        <li>Diperlukan KTP / Jaminan Lainnya ?
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label for="ktp">
                                        <input type="radio" name="ktp" value="Ya">Ya<br>
                                        <input type="radio" name="ktp" value="Tidak">Tidak<br />
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>Pengiriman yang tersedia ?
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label for="pengiriman">
                                    <input type="checkbox" name="pengiriman[]" value="Ambil Sendiri"> Ambil Sendiri<br></td>
                                    <input type="checkbox" name="pengiriman[]" value="Diantar"> Diantar<br></td>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>Jika bisa di antar, Biaya pengiriman ?
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label for="pengiriman"> > 1km </label>
                                    <input type="text" name="pengiriman[]" value=""> <br></td>
                                    
                                    <label for="pengiriman"> > 5km </label>
                                    <input type="text" name="pengiriman[]" value=""> <br></td>

                                    
                            
                                </div>
                            </div>
                        </li>
                       
                        <!-- <li></li> -->
                        <!-- <li>Mulai tanggal 15 Maret 2021 pukul 22:00 WIB, kalkulasi PPN akan dihitung secara otomatis oleh sistem.</li>
                        <li>Merchant non PKP akan otomatis tidak dikenakan pajak PPN tambahan, sedangkan untuk Merchant PKP kalkulasi PPN akan dihitung otomatis sesuai dengan jenis barang yang sudah diatur pada masing-masing produk.</li> -->

                    </ol>
                    </p>

                    <form>
                        <!-- <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address">
                        </div> -->
                        <button type="button" class="btn btn-primary" data-dismiss="modal">oke</button>
                        <!-- <button type="submit" class="btn btn-primary">Subscribe</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>