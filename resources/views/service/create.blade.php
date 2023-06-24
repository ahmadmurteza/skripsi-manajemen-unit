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
        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Penanggung Jawab</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="penanggung_jawab"
                    placeholder="perusahaan, vendor, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Deskripsi</label
                >
                <textarea
                    class="form-control"
                    name="deskripsi"
                    rows="3"
                    required
                ></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Sparepart yang diperlukan</label
                >
                <textarea
                    class="form-control"
                    name="sparepart"
                    rows="3"
                    required
                ></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >HM Triger</label
                >
                <input
                    type="number"
                    class="form-control"
                    id="basic-default-fullname"
                    name="hm"
                    placeholder="perusahaan, vendor, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Jenis Unit</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="jenis_unit" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    <option value="dozer">Dozer</option>
                    <option value="exavator">Exavator</option>                   
                    <option value="buldozer">Bulldozer</option>                   
                    <option value="grader">Grader</option>                   
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
