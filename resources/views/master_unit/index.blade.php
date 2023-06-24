@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-8">Table Daftar Unit</h5>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="{{ route('unit.create') }}" type="button" class="btn btn-primary">
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
                        <th>Jenis Unit</th>
                        <th>Aset</th>
                        <th>Nomer Serial</th>
                        <th>Nomer Lambung</th>
                        <th>Status</th>
                        <th>Ketarangan</th>
                        <th>Lokasi</th>
                        <th>HM/KM</th>
                        <th>HM/KM Service Triger</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($units as $index => $unit)
                    <tr>
                        <td><strong>{{ $index +1 }}</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($unit->jenis_unit) }}</strong></td>
                        <td>{{ $unit->aset }}</td>
                        <td>{{ $unit->nomer_serial }}</td>
                        <td>{{ $unit->nomer_lambung }}</td>
                        <td>
                            @if ($unit->status == 'ready')
                            <span class="badge bg-primary">{{ $unit->status }}</span>
                            @else
                            <span class="badge bg-danger">{{ $unit->status }}</span>
                            @endif
                        
                        </td>
                        <td>{{ $unit->keterangan }}</td>
                        <td>{{ $unit->nama_lokasi }}</td>
                        <td>{{ $unit->hm }}</td>
                        <td>{{ $unit->hm_triger }}</td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('unit.edit', $unit->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <form action="{{ route('unit.delete', $unit->id) }}" method="POST">
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