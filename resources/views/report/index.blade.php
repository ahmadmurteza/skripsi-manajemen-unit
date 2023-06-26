@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-8">Table Daftar Laporan Rusak</h5>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="{{ route('report.create') }}" type="button" class="btn btn-primary">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Data
                    </a>
                </div>
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
                        <th>Waktu Insiden</th>
                        <th>Nomer Lambung</th>
                        <th>Nama Lokasi</th>
                        <th>Pengadu</th>
                        <th>Kerusakan</th>
                        <th>Status</th>
                        <th>Prioritas</th>
                        <th>Foto Insiden</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($reports as $index => $report)
                    <tr>
                        <td><strong>{{ $index +1 }}</strong></td>
                        <td>{{  $report->waktu_insiden  }}</td>
                        <td><strong>{{ $report->nomer_lambung }}</strong></td>
                        <td>{{ $report->nama_lokasi }}</td>
                        <td>{{ $report->pengadu }}</td>
                        <td>{{ $report->kerusakan }}</td>
                        <td>
                            @if ($report->prioritas == 'rendah')
                            <span class="badge bg-primary">{{ $report->prioritas }}</span>
                            @elseif($report->prioritas == 'sedang')
                            <span class="badge bg-warning">{{ $report->prioritas }}</span>
                            @else
                            <span class="badge bg-danger">{{ $report->prioritas }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($report->status == 'selesai')
                            <span class="badge bg-primary">{{ $report->status }}</span>
                            @elseif($report->status == 'proses')
                            <span class="badge bg-warning">{{ $report->status }}</span>
                            @else
                            <span class="badge bg-secondary">{{ $report->status }}</span>
                            @endif
                        </td>
                        <td><img src="{{ url($report->foto_insiden) }}" width="100" height="100"></td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('report.edit', $report->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <form action="{{ route('report.delete', $report->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    
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