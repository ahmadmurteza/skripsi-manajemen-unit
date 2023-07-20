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
                            <select class="form-select" aria-label="Default select example" onchange="changePriority({{ $report->id }})" id="priority{{ $report->id }}">
                                <option value="rendah"{{ $report->prioritas == "rendah" ? ' selected' : '' }}>rendah</option>
                                <option value="sedang"{{ $report->prioritas == "sedang" ? ' selected' : '' }}>sedang</option>
                                <option value="tinggi"{{ $report->prioritas == "tinggi" ? ' selected' : '' }}>tinggi</option>
                            </select>
                            <p style="visibility: hidden;">ssssssssssssssss</p>
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
                        <td><img src="{{ asset("storage/" . substr($report->foto_insiden, 7)) }}" width="100" height="100"></td>
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
  <script>
   
    function changePriority(id) {
        status = $('priority'+id).val();
        alert('priority'+id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({ 
           type: "POST", 
           url: "{{route('report.priority')}}",               
           data:{id:id, status: status},
           success: function(result) {
            console.log('donde');
           }
       });
    }
  </script>
@endsection

@section('script')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

<script>
    $(document).ready(function(){
		$('#table').DataTable();

        
	});
</script>
@endsection