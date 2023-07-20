@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-8">Table Daftar Cetak Laporan</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if (Session::has('success'))
                    <div class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-bordered table-responsive text-nowrap" id="table">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tabel Laporan</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td><strong>1</strong></td>
                            <td>Laporan Unit</td>
                            <td>
                                <a href="{{ route('pdf.unit') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2</strong></td>
                            <td>Laporan Service</td>
                            <td>
                                <a href="{{ route('pdf.service') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>3</strong></td>
                            <td>Laporan User</td>
                            <td>
                                <a href="{{ route('pdf.user') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>4</strong></td>
                            <td>Laporan Lokasi</td>
                            <td>
                                <a href="{{ route('pdf.location') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>5</strong></td>
                            <td>Laporan Lokasi Gudang</td>
                            <td>
                                <a href="{{ route('pdf.warehouse') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>6</strong></td>
                            <td>Laporan Pembelian Sparepart</td>
                            <td>
                                <a href="{{ route('pdf.pembelian') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>7</strong></td>
                            <td>Laporan Penggunaan Sparepart</td>
                            <td>
                                <a href="{{ route('pdf.penggunaan') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>8</strong></td>
                            <td>Laporan Kerusakan</td>
                            <td>
                                <a href="{{ route('pdf.rusak') }}" class="btn btn-warning">Cetak</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
  </div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

<script>
    $(document).ready(function(){
		$('#table').DataTable();

        
	});
</script>
@endsection