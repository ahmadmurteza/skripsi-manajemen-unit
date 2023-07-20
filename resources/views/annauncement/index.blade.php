@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-8">Table Daftar Pemberitahuan</h5>
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
                        <th>Deskripsi</th>
                        <th>Waktu Terkirim</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($annauncements as $index => $annauncement)
                    <tr>
                        <td><strong>{{ $index +1 }}</strong></td>
                        <td>{{  $annauncement->deskripsi  }}</td>
                        <td><strong>{{ $annauncement->created_at }}</strong></td>
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