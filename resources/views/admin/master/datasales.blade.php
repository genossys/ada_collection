@extends('admin.master')

@section('judul')
Data Sales
@endsection

@section('content')


<!-- Button to Open the Modal -->
<br>
<div>
    <button id="tambahModal" style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-primary box-tools pull-right" onclick="showTambahSales()">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Data Sales
    </button>

</div>
<br>
    <br>
    <hr>
<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Sales</th>
                <th>Nama</th>
                <th>No. Telp</th>
                <th>Target</th>
                <th>Diskon</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!--Srart Modal -->
<div class="modal fade" id="modalSales">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Sales</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSales" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <input type="hidden" name="oldkdsales" id="oldkdsales">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Kode Sales </label>
                                <input type="text" class="form-control" placeholder="Kode Sales" id="kdSales" name="kdSales">
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama </label>
                                <input type="text" class="form-control" placeholder="Nama" id="namaSales" name="namaSales">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No.Telp </label>
                                <input type="text" class="form-control" placeholder="No. Telp" id="nohp" name="nohp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Target </label>
                                <input type="number" class="form-control" placeholder="Target Sales" id="target" name="target">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Diskon </label>
                                <input type="number" class="form-control" placeholder="Diskon Sales" id="diskon" name="diskon">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
<script src="{{ asset('/js/Master/sales.js') }}"></script>
@endsection
