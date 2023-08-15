@extends('layouts.layout')

@section('style')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('content')
 
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data</h5>
            <a class="btn btn-danger" href="{{route('report')}}">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="card">
                <img class="card-img-top" src="{{ asset("storage/" . substr($ticket->foto_insiden, 7)) }}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-text">{{ $ticket->kerusakan }} dilaporkan oleh {{ $ticket->pengadu }}</h3><br>
                    <span class="badge bg-warning">{{ $ticket->prioritas }}</span>
                    <span class="badge bg-info">{{ $ticket->status }}</span> &nbsp; waktu insiden <b>{{ now()->parse($ticket->waktu_insiden)->format('d, M Y') }}</b> 
                </div>
            </div>
        </div>
        <div class="col-5  overflow-auto" >
            <div class="card ">
                <div class="card-header">
                    Diskusi
                </div>
                <div class="card-body" style="max-height:400px; overflow: scroll;">
                    @foreach ($discus as $item)
                        <div class="card mb-3 shadow-sm p-3 mb-5 bg-white rounded">
                            <div class="card-body">

                                <b>{{$item->user->name}}</b> &nbsp; <span class="badge bg-info">{{ $item->user->jabatan }}</span> <br><br>
    
                                <p>{{ $item->deskripsi }}</p>

                                <i>{{ now()->parse($item->created_at)->format('d, M Y') }}</i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <form action="{{ route('report.discus') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname"
                                >Deskripsi</label
                            >
                            <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
 <script>
    $("#thediv").each( function() 
{
   // certain browsers have a bug such that scrollHeight is too small
   // when content does not fill the client area of the element
   var scrollHeight = Math.max(this.scrollHeight, this.clientHeight);
   this.scrollTop = scrollHeight - this.clientHeight;
});
 </script>
@endsection