@extends('admin.master')

@section('judul')
Data Sales
@endsection

@section('content')


<!-- Button to Open the Modal -->
<div>
    <button id="tambahModal" style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-primary box-tools pull-right" data-toggle="modal" data-target="#modaltambahSales">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Data Sales
    </button>

</div>

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
<div class="modal fade" id="modaltambahSales">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Sales</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanSales" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Kode Sales </label>
                                <input type="text" class="form-control" placeholder="Kode Sales" id="txtKodeSales" name="txtKodeSales">
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama </label>
                                <input type="text" class="form-control" placeholder="Nama" id="txtNama" name="txtNama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No.Telp </label>
                                <input type="text" class="form-control" placeholder="No. Telp" id="txtNoTelp" name="txtNoTelp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Target </label>
                                <input type="number" class="form-control" placeholder="Target Sales" id="txtTargetSales" name="txtTargetSales">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Diskon </label>
                                <input type="number" class="form-control" placeholder="Diskon Sales" id="txtDiskonSales" name="txtDiskonSales">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection

@section('css')
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/changemodal.js') }}"></script>


@endsection
