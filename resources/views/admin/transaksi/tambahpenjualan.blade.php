@extends('admin.master')

@section('judul')
Transaksi Penjualan
@endsection

@section('content')
<div>
    <div class="row pt-2">
        <div class="col-sm-4">
            <div class="form-group mb-0">
                <label class="mb-0">Kode Transaksi </label>
                <input type="text" readonly class="form-control" placeholder="Kode Transaksi" id="txtKodeTransaksi" name="txtKodeTransaksi">
            </div>
        </div>

        <div class="col-sm-4 mb-0">
            <label class="mb-0">Customer</label>
            <div class="form-inline">
                <button type="button" class="btn btn-info" style="width: 10%;border-top-right-radius: 0;border-bottom-right-radius: 0" id="cutomerModal" data-toggle="modal" data-target="#modalCariCustomer"><i class="fa fa-search" aria-hidden="true"></i></button>
                <input type="text" readonly class="form-control" placeholder="Customer" id="txtCustomer" name="txtCustomer" style="width: 90%;border-top-left-radius: 0;border-bottom-left-radius: 0">
            </div>
        </div>

        <div class=" col-sm-4">
            <label><br></label>
            <div class="form-inline">
                <a class="text-danger"> *Joko </a>
            </div>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-sm-4">
            <div class="form-group mb-0">
                <label class="mb-0">Tanggal</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control float-right datepicker" name="dateTanggalLahir" id="dateTanggalLahir">
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-0">
            <label class="mb-0">Sales</label>
            <div class="form-inline">
                <button class="btn btn-info " style="width: 10%;border-top-right-radius: 0;border-bottom-right-radius: 0" id="salesModal" data-toggle="modal" data-target="#modalCariSales"><i class="fa fa-search" aria-hidden="true"></i></button>
                <input type="text" readonly class="form-control" placeholder="Sales" id="txtSales" name="txtSales" style="width: 90%;border-top-left-radius: 0;border-bottom-left-radius: 0">

            </div>
        </div>

        <div class=" col-sm-4">
            <label><br></label>
            <div class="form-inline">
                <a class="text-danger"> *Saipul </a>
            </div>
        </div>
    </div>
</div>

<div class="pt-5 text-right" style="width: 100%">
    <button class="btn btn-primary mb-1 " id="barangModal" data-toggle="modal" data-target="#modalCariBarang"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    <div class="table-responsive-lg">
        <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Qty</th>
                    <th>Diskon</th>
                    <th>Harga Jual</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="w-100" >
    <div class="row mb-1">
        <div class="col-sm-6 offset-sm-6">
            <div class="form-inline">
                <label class="ml-auto">Sub Total :</label>
                <input  type="text" readonly class="form-control" placeholder="Sub Total" id="txtSubTotal" name="txtSubTotal">
            </div>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-sm-6 offset-sm-6">
            <div class="form-inline">
                <label class="ml-auto">Diskon :</label>
                <input  type="text" class="form-control" placeholder="Diskon" id="txtDiskonKeseluruhan" name="txtDiskonKeseluruhan">
            </div>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-sm-6 offset-sm-6">
            <div class="form-inline">
                <label class="ml-auto">Grand Total :</label>
                <input  type="text" readonly class="form-control" placeholder="Grand Total" id="txtGrandTotal" name="txtGrandTotal">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-6 text-right">
            <button class="btn btn-primary btn-lg ">Simpan</button>
        </div>
    </div>

</div>












<!--Start Modal -->
<div class="modal fade" id="modalCariCustomer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Customer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-lg">
                    <table id="tbcustomer" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Customer</th>
                                <th>Nama Customer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EndModal -->

<!--Start Modal -->
<div class="modal fade" id="modalCariSales">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sales</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-lg">
                    <table id="tbcustomer" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Sales</th>
                                <th>Nama Sales</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EndModal -->

<!--Start Modal -->
<div class="modal fade" id="modalCariBarang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-lg">
                    <table id="tbcustomer" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/changemodal.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

@endsection
