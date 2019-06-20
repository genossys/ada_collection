@extends('admin.master')

@section('judul')
Data Penjualan
@endsection

@section('content')


<!-- Button to Open the Modal -->
<div>
    <a style="margin-bottom: 10px; margin-top: 20px" class="btn btn-primary box-tools pull-right text-white" href="{{route('tambahpenjualan')}}">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Data Penjualan
    </a>

</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Transaksi</th>
                <th>Kode Customer</th>
                <th>Tanggal</th>
                <th>Diskon</th>
                <th>Total</th>
                <th>Status Lunas</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@section('css')
@endsection


@section('script')
@endsection
