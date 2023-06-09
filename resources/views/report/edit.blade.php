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
        <form action="{{ route('report.update', $report->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Waktu Insiden</label
                >
                <input
                    type="datetime-local"
                    class="form-control"
                    id="basic-default-fullname"
                    name="waktu_insiden"
                    value="{{ $report->waktu_insiden }}"
                    placeholder="perusahaan, vendor, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Unit</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="master_unit_id" required>
                    <option value="" selected disabled>Pilih Salah Satu</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}"{{ $unit->id == $report->master_unit_id ? ' selected' : '' }}>{{ $unit->nomer_lambung }}</option>                          
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Lokasi</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="lokasi_id" required>
                    <option value="" selected disabled>Pilih Salah Satu</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}"{{ $location->id == $report->lokasi_id ? ' selected' : '' }}>{{ $location->nama_lokasi }}</option>                          
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Pengadu</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="pengadu"
                    value="{{ $report->pengadu }}"
                    placeholder="jhon, doe, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Kerusakan</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    name="kerusakan"
                    value="{{ $report->kerusakan }}"
                    placeholder="Mati, Low Machine, ..."
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Status</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    <option value="selesai"{{ $report->status == 'selesai' ? ' selected' : '' }}>Selesai</option>                          
                    <option value="proses"{{ $report->status == 'proses' ? ' selected' : '' }}>Proses</option>                          
                    <option value="menunggu"{{ $report->status == 'menunggu' ? ' selected' : '' }}>Menunggu</option>                          
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Prioritas</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="prioritas" required>
                    <option selected disabled>Pilih Salah Satu</option>
                    <option value="rendah"{{ $report->prioritas == 'rendah' ? ' selected' : '' }}>Rendah</option>                          
                    <option value="sedang"{{ $report->prioritas == 'sedang' ? ' selected' : '' }}>Sedang</option>                          
                    <option value="tinggi"{{ $report->prioritas == 'tinggi' ? ' selected' : '' }}>Tinggi</option>                          
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Foto Insiden</label
                >
                <input
                    type="file"
                    class="form-control"
                    id="basic-default-fullname"
                    name="foto_insiden"
                    placeholder="100, 1000, ..."
                />
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
