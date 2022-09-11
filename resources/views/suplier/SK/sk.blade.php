@extends('master.penjual_layout')


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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data SK</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data SK</span>
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
                                        <th>User</th>
                                        <th>SK1</th>
                                        <th>SK2</th>
                                        <th>SK3</th>
                                        <th>SK4</th>
                                        <th>SK5</th>
                                        <th>SK6</th>
                                        <th>SK7</th>
                                        <th>SK8</th>
                                        <th>SK9</th>
                                        <th>SK10</th>
                                        <th class="col-3 text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($SK as $g)
                                    <tr>
                                    <td class="pr-1 pl-1 text-center">{{@$g->user->name}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk1}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk2}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk3}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk4}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk5}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk6}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk7}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk8}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk9}}</td>
                                    <td class="pr-2 pl-2 ">{{$g->sk10}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-info editbtn" value="{{$g->id}}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-outline-danger deletebtn" value="{{$g->id}}"><i class="fa-solid fa-trash"></i></button>
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
                url: "/Sk_edit/" + id,
                success: function(response) {
                    console.log(response.sk.sk1)
                    $('#sk1').val(response.sk.sk1);
                    $('#sk2').val(response.sk.sk2);
                    $('#sk3').val(response.sk.sk3);
                    $('#sk4').val(response.sk.sk4);
                    $('#sk5').val(response.sk.sk5);
                    $('#sk6').val(response.sk.sk6);
                    $('#sk7').val(response.sk.sk7);
                    $('#sk8').val(response.sk.sk8);
                    $('#sk9').val(response.sk.sk9);
                    $('#sk10').val(response.sk.sk10);
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
                <form action="/Sk_store" method="POST" enctype="multipart/form-data">
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
                        <label>SK1</label>
                        <input type="text" required="required" class="form-control" name="sk1" id="sk1">
                    </div>
                    <div class="form-group">
                        <label>SK2</label>
                        <input type="text" required="required" class="form-control" name="sk2" id="sk2">
                    </div>
                    <div class="form-group">
                        <label>SK3</label>
                        <input type="text" required="required" class="form-control" name="sk3" id="sk3">
                    </div>
                    <div class="form-group">
                        <label>SK4</label>
                        <input type="text" required="required" class="form-control" name="sk4" id="sk4">
                    </div>
                    <div class="form-group">
                        <label>SK5</label>
                        <input type="text" required="required" class="form-control" name="sk5" id="sk5">
                    </div>
                    <div class="form-group">
                        <label>SK6</label>
                        <input type="text" required="required" class="form-control" name="sk6" id="sk6">
                    </div>
                    <div class="form-group">
                        <label>SK7</label>
                        <input type="text" required="required" class="form-control" name="sk7" id="sk7">
                    </div>
                    <div class="form-group">
                        <label>SK8</label>
                        <input type="text" required="required" class="form-control" name="sk8" id="sk8">
                    </div>
                    <div class="form-group">
                        <label>SK9</label>
                        <input type="text" required="required" class="form-control" name="sk9" id="sk9">
                    </div>
                    <div class="form-group">
                        <label>SK10</label>
                        <input type="text" required="required" class="form-control" name="sk10" id="sk10">
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
<!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title">Update SK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> -->
                <!--FORM UPDATE BARANG-->
                <!-- <form action="/Sk/update" method="post">
                    @csrf

                    <input type="hidden" id="id" name="id"> <br />
                    <div class="form-group">
                        <label>SK1</label>
                        <input type="text" required="required" class="form-control" name="sk1" id="sk1">
                    </div>
                    <div class="form-group">
                        <label>SK2</label>
                        <input type="text" required="required" class="form-control" name="sk2" id="sk2">
                    </div>
                    <div class="form-group">
                        <label>SK3</label>
                        <input type="text" required="required" class="form-control" name="sk3" id="sk3">
                    </div>
                    <div class="form-group">
                        <label>SK4</label>
                        <input type="text" required="required" class="form-control" name="sk4" id="sk4">
                    </div>
                    <div class="form-group">
                        <label>SK5</label>
                        <input type="text" required="required" class="form-control" name="sk5" id="sk5">
                    </div>
                    <div class="form-group">
                        <label>SK6</label>
                        <input type="text" required="required" class="form-control" name="sk6" id="sk6">
                    </div>
                    <div class="form-group">
                        <label>SK7</label>
                        <input type="text" required="required" class="form-control" name="sk7" id="sk7">
                    </div>
                    <div class="form-group">
                        <label>SK8</label>
                        <input type="text" required="required" class="form-control" name="sk8" id="sk8">
                    </div>
                    <div class="form-group">
                        <label>SK9</label>
                        <input type="text" required="required" class="form-control" name="sk9" id="sk9">
                    </div>
                    <div class="form-group">
                        <label>SK10</label>
                        <input type="text" required="required" class="form-control" name="sk10" id="sk10">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form> -->
                <!--END FORM UPDATE BARANG-->
            <!-- </div>
        </div>
    </div>
</div> -->
<!-- End Modal UPDATE Barang -->
@endsection