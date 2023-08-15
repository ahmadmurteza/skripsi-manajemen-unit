@extends('layouts.layout') 

@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Data</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Nama</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="John Doe"
                    name="name"
                    value="{{ $user->name }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-email"
                    >Email</label
                >
                <div class="input-group input-group-merge">
                    <input
                        type="text"
                        id="basic-default-email"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        aria-describedby="basic-default-email2"
                        name="email"
                        value="{{ $user->email }}"
                        required
                    />
                </div>
                <div class="form-text">
                   Masukan dengan format email
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Role</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="role" required>
                    <option disabled>Pilih Salah Satu</option>
                    <option value="planner"{{ $user->location == "planner" ? " selected" : "" }}>Planner</option>
                    <option value="mekanik"{{ $user->location == "mekanik" ? " selected" : "" }}>Mekanik</option>
                    <option value="operator"{{ $user->location == "operator" ? " selected" : "" }}>Operator</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company"
                    >Lokasi</label
                >
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="lokasi_id" required>
                    <option disabled>Pilih Salah Satu</option>
                    @foreach ($locations as $location)
                    <option value="{{ $location->id }}"{{ $user->lokasi_id == $location->id ? " selected" : "" }}>{{ $location->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Jabatan</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="Planner Pit A, Head Office Jakarta, ..."
                    name="jabatan"
                    value="{{ $user->jabatan }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-phone"
                    >Nomer Whatsapp</label
                >
                <input
                    type="text"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder="628 1549 52xx"
                    name="no_wa"
                    value="{{ $user->no_wa }}"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >Password</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="basic-default-fullname"
                    placeholder="{{ $user->password }}"
                    name="password"
                />
                <div class="form-text">
                    Silahkan isi ulang password untuk pengguna, <span class="text-danger">jika tidak ingin diubah jangan diisi</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
@endsection
