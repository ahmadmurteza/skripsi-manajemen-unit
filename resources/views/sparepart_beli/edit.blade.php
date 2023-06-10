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
        <form action="{{ route('sparepart-beli.update', $sparepart->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Gudang</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="gudang_sparepart_id" required>
                    <option value="" disabled>Pilih Salah Satu</option>
                    @foreach ($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}"{{ $sparepart->gudang_sparepart_id == $warehouse->id ? " selected" : "" }}>{{ $warehouse->nama_gudang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Tanggal Diterima</label
                >
                <input
                    type="date"
                    class="form-control"
                    id="basic-default-fullname"
                    name="tanggal_diterima"
                    value="{{ $sparepart->tanggal_diterima }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Deskripsi</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="Nama atau penjelasan sparepart ..."
                    name="deskripsi"
                    value="{{ $sparepart->deskripsi }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nomor Part</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="FLT2031, BAT0023, ..."
                    name="nomor_part"
                    value="{{ $sparepart->nomor_part }}"
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
                    value="{{ $sparepart->jumlah }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Harga Satuan</label
                >
                <input
                    type="number"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="10000, 2000, 300000, ..."
                    name="harga_satuan"
                    value="{{ $sparepart->harga_satuan }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Suplier</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="Yamaha, Honda, Suzuki, ..."
                    name="suplier"
                    value="{{ $sparepart->suplier }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nomor PO</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="PO#0002, PO#0023, PO#0042, ..."
                    name="nomor_po"
                    value="{{ $sparepart->nomor_po }}"
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
                    value="{{ $sparepart->penerima }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Status</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status" required>
                    <option value="" disabled>Pilih Salah Satu</option>
                    <option value="diterima"{{ $sparepart->status == "diterima" ? " selected" : "" }}>Diterima</option>
                    <option value="dibatalkan"{{ $sparepart->status == "dibatalkan" ? " selected" : "" }}>Dibatalkan</option>
                    <option value="proses"{{ $sparepart->status == "proses" ? " selected" : "" }}>Proses</option>                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
