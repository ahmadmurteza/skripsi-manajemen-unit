@extends('layouts.layout') 
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Data</h5>
    </div>
    <div class="card-body">
        @if (Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <form action="{{ route('pasien.update', $pasien->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Kode Pasien</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="kode_pasien"
                    placeholder="perusahaan, vendor, ..."
                    value="{{ $pasien->kode_pasien }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nama Pasien</label
                >
                <textarea
                    class="form-control"
                    name="nama_pasien"
                    value=""
                    rows="3"
                    required
                >{{ $pasien->nama_pasien }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nomer Hp</label
                >
                <textarea
                    class="form-control"
                    name="no_hp"
                    value=""
                    rows="3"
                    required
                >{{ $pasien->no_hp }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Alamat</label
                >
                <textarea
                    class="form-control"
                    name="alamat"
                    rows="3"
                    required
                >{{ $pasien->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
