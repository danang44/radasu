@extends('master.admin_layout')


@section('content')

<style>
    label {
        color: white !important;
    }

    option {
        color: black;
    }
    .dataTables_info {
        color: white !important;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline" style="background-color:#011126">
                    <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Penjual</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data Penjual</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-right">
                        <button type="button" class=" mt-3 mb-1 btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class=" card">
                        <div class="pt-2 pr-1 pl-1 table-responsive col-sm-12 ">
                            <table id="table_id" class="table table-striped  table-striped table-border m-1 datatable-scroll-y">
                                <thead>
                                <tr class="text-center">
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nama Toko</th>
                                        <th>Jaminan</th>
                                        <th>Opsi Pengiriman</th>
                                        <th class="col-3 text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($penjual as $c)
                                    <tr>
                                    <!-- <td class="pr-2 pl-1 text-center"><img width="80px" src="{{ url('/data_produk/'.$c->gambar) }}"></td> -->
                                    <td class="pr-1 pl-1 text-center">{{@$c->user->name}}</td>
                                    <td class="pr-2 pl-2 ">{{$c->alamat}}</td>
                                    <td class="pr-2 pl-2 ">{{$c->nama_toko}}</td>
                                    <td class="pr-2 pl-2 ">{{$c->ktp}}</td>
                                    <td class="pr-2 pl-2 ">{{$c->pengiriman}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-info editbtn" value="{{$c->id}}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-outline-danger deletebtn" value="{{$c->id}}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
        $(document).on('click', '.deletebtn', function() {
            var id = $(this).val();
            // alert(id);
            $('#deleteModal').modal('show');
            $('#deleting_id').val(id);
        });
        $(document).on('click', '.editbtn', function() {
            var id = $(this).val();
            // alert(id)
            $('#editModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/penjual_edit/" + id,
                success: function(response) {
                    console.log(response.penjual.alamat)
                    $('#alamat').val(response.penjual.alamat);
                        $('#nama_toko').val(response.penjual.nama_toko);
                        $('#ktp').val(response.penjual.ktp);
                        $('#pengiriman').val(response.penjual.pengiriman);
                        $('#id').val(response.penjual.id);
                }
            });
        });
    });
</script>
<!-- Modal Update Barang-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title">Update penjual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/penjual/update" method="post">
                    @csrf

                    <input type="hidden" id="id" name="id"> <br />
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" required="required" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" required="required" class="form-control" name="nama_toko" id="nama_toko">
                    </div>
                    <div class="form-group">
                        <label>Jaminan</label>
                        <input type="text" required="required" class="form-control" name="ktp" id="ktp">
                    </div>

                    <div class="form-group">
                        <label>Opsi Pengiriman</label>
                        <input type="text" required="required" class="form-control" name="pengiriman" id="pengiriman">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Barang-->
<!-- add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/penjual_store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <select id="user_id" name="user_id" class=" col-md-4 form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                            <option value=>-- Pilih user --</option>
                            @foreach($user as $k)
                            <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" required="required" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" required="required" class="form-control" name="nama_toko" id="nama_toko">
                    </div>
                    <div class="form-group">
                        <label>Jaminan</label>
                        <input type="text" required="required" class="form-control" name="ktp" id="ktp">
                    </div>

                    <div class="form-group">
                        <label>Opsi Pengiriman</label>
                        <input type="text" required="required" class="form-control" name="pengiriman" id="pengiriman">
                    </div>

                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit"  value="Upload" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add -->




<!-- delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/penjual/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <h3>Anda yakin menghapus data ?</h3>
                    <input type="hidden" id="deleting_id" name="delete_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-primary">Hapus</button>
                    </div>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- end delete -->

@endsection