@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-8">Table Pengguna</h5>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="{{ route('user.create') }}" type="button" class="btn btn-primary">
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
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Role App</th>
                        <th>No Whatsapp</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($users as $index => $user)
                    <tr>
                        <td><strong>{{ $index +1 }}</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($user->name) }}</strong></td>
                        <td>{{ $user->nama_lokasi }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->jabatan }}</td>
                        @if ($user->role == 'ho')
                        <td><span class="badge bg-label-primary me-1">{{ $user->role }}</span></td>
                        @elseif ($user->role == 'planner')
                        <td><span class="badge bg-label-secondary me-1">{{ $user->role }}</span></td>
                        @elseif ($user->role == 'mekanik')
                        <td><span class="badge bg-label-danger me-1">{{ $user->role }}</span></td>
                        @elseif ($user->role == 'operator')
                        <td><span class="badge bg-label-warning me-1">{{ $user->role }}</span></td>
                        @endif
                        <td>{{ $user->no_wa }}</td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
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