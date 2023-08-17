@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-8">Tabel Pasien</h5>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="{{ route('pasien.create') }}" type="button" class="btn btn-primary">
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
                <table class="table table-responsive text-nowrap" id="table">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($pasiens as $index => $pasien)
                    <tr>
                        <td><strong>{{ $index +1 }}</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($pasien->kode_pasien) }}</strong></td>
                        <th>{{ $pasien->nama_pasien }}</th>
                        <th>{{ $pasien->alamat }}</th>
                        <th>{{ $pasien->no_hp }}</th>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('pasien.edit', $pasien->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <form action="{{ route('pasien.delete', $pasien->id) }}" method="POST">
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
                
                <a href="{{ route('pasien.cetak') }}" type="button" class="btn btn-warning">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Cetak Data
                    </a> &nbsp;
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