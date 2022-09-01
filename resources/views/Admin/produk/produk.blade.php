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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Produk</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data Produk</span>
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
                                        <th>Gambar</th>
                                        <th>Jenis</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th class="col-3 text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $c)
                                    <tr>
                                    <td class="pr-2 pl-1 text-center"><img width="80px" src="{{ url('/data_produk/'.$c->gambar) }}"></td>
                                    <td class="pr-1 pl-1 text-center">{{@$c->category->keterangan}}</td>
                                    <td class="pr-2 pl-2 ">{{$c->nama}} ({{$c->stok}})</td>
                                    <td class="pr-1 pl-1 text-center">Rp {{number_format($c->harga_sewa)}}</td>
                                    <td class="pr-1 pl-1">{{$c->deskripsi}}</td>
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
                url: "/produk_edit/" + id,
                success: function(response) {
                    console.log(response.produk.keterangan)
                    $('#nama').val(response.product.nama);
                        $('#deskripsi').val(response.product.deskripsi);
                        $('#stok').val(response.product.stok);
                        $('#harga_sewa').val(response.product.harga_sewa);
                        $('#category_id').val(response.product.category_id);
                        $('#id').val(response.product.id);
                }
            });
        });
    });
</script>
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
                <form action="/produk_store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kategori</label>
                        <select id="category_id" name="category_id" class=" col-md-4 form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                            <option value=>-- Pilih Kategori --</option>
                            @foreach($category as $k)
                            <option value="{{$k->id}}">{{$k->keterangan}}</option>
                            @endforeach
                        </select>

                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" required="required" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" required="required" class="form-control" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="form-group">
                        <label>stok</label>
                        <input type="text" required="required" class="form-control" name="stok" id="stok">
                    </div>

                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="text" required="required" class="form-control" name="harga_sewa" id="harga_sewa">
                    </div>

                    <div class="form-group">
                            <div style="position:relative;">
                                <a class='btn btn-info col-sm-3' href='javascript:;'>
                                    Choose Image...
                                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="gambar" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                                </a>
                                &nbsp;
                                <span class='label label-info' id="upload-file-info"></span>
                            </div>
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

<!-- Modal Update Barang-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title">Update Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/produk/update" method="post">
                    @csrf

                    <input type="hidden" id="id" name="id"> <br/>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" required="required" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" required="required" class="form-control" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" required="required" class="form-control" name="stok" id="stok">
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="text" required="required" class="form-control" name="harga_sewa" id="harga_sewa">
                    </div>
                    <div class="form-group">
                            <div style="position:relative;">
                                <a class='btn btn-info col-sm-3' href='javascript:;'>
                                    Choose Image...
                                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="gambar" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                                </a>
                                &nbsp;
                                <span class='label label-info' id="upload-file-info"></span>
                            </div>
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
                <form action="/produk/delete" method="post">
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