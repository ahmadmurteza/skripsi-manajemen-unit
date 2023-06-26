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
        <form action="{{ route('unit.update', $unit->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Jenis Unit</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="jenis_unit" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    <option value="dozer"{{ $unit->jenis_unit == 'dozer' ? ' selected' : '' }}>Dozer</option>
                    <option value="exavator"{{ $unit->jenis_unit == 'excavator' ? ' selected' : '' }}>Exavator</option>                   
                    <option value="buldozer"{{ $unit->jenis_unit == 'buldozer' ? ' selected' : '' }}>Bulldozer</option>                   
                    <option value="grader"{{ $unit->jenis_unit == 'grader' ? ' selected' : '' }}>Grader</option>                   
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
                    value="{{ $unit->aset }}"
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
                    value="{{ $unit->nomer_serial }}"
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
                    value="{{ $unit->nomer_lambung }}"
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
                    value="{{ $unit->hm }}"
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
                    value="{{ $unit->keterangan }}"
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
                    <option value="ready"{{ $unit->status == 'ready' ? ' selected' : '' }}>Ready</option>
                    <option value="breakdown" {{ $unit->status == 'breakdown' ? ' selected' : '' }}>Breakdown</option>                   
                    <option value="run" {{ $unit->status == 'run' ? ' selected' : '' }}>Run</option>                       
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Lokasi</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="lokasi_id" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}"{{ $unit->lokasi_id == $location->id ? ' selected' : '' }}>{{ $location->nama_lokasi }}</option>                          
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
                        <option value="{{ $service->id }}"{{ $unit->hm_service_id == $service->id ? ' selected' : '' }}>{{ $service->deskripsi }} - {{ $service->hm }}HM</option>                          
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
