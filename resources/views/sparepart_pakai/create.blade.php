@extends('layouts.layout') 
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Data</h5>
    </div>
    <div class="card-body">
        @if (Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <form action="{{ route('sparepart-pakai.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Sparepart</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="sparepart_beli_id" required>
                    <option selected="" disabled>Pilih Salah Satu</option>
                    @foreach ($sparepartBeli as $sp)
                    <option value="{{ $sp->id }}">{{ $sp->deskripsi }} ({{ $sp->nomor_part }} || {{ $sp->nomor_po }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Tanggal Dipakai</label
                >
                <input
                    type="date"
                    class="form-control"
                    id="basic-default-fullname"
                    name="tanggal_dipakai"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Jumlah</label
                >
                <input
                    type="number"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="10, 200, 300, ..."
                    name="jumlah"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Penerima</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="Jhon, Doe, ..."
                    name="penerima"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Status</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    <option value="dipasang">Dipasang</option>
                    <option value="disimpan">Disimpan</option>                   
                    <option value="proses">Proses</option>                   
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
