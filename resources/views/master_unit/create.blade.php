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
        <form action="{{ route('unit.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
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
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Aset</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="aset"
                    placeholder="perusahaan, vendor, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nomor Serial</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="nomer_serial"
                    placeholder="#UNIT1232, #UNIT1112, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nomor Lambung</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="nomer_lambung"
                    placeholder="CN-1232, CN-1242, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >HM/KM</label
                >
                <input
                    type="number"
                    class="form-control"
                    id="basic-default-fullname"
                    name="hm"
                    placeholder="100, 1000, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Keterangan</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="keterangan"
                    placeholder="Ready, Breakdown di, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Status Unit</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    <option value="ready">Ready</option>
                    <option value="breakdown">Breakdown</option>                   
                    <option value="run">Run</option>                       
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Lokasi</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="lokasi_id" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->nama_lokasi }}</option>                          
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Service Berkala</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="hm_service_id" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->deskripsi }} - {{ $service->hm }}HM</option>                          
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
