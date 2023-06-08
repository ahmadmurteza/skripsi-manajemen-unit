@extends('layouts.layout') 
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Data</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
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
                    <option selected="">Pilih Salah Satu</option>
                    <option value="HO">HO</option>
                    <option value="Planner">Planner</option>
                    <option value="Mekanik">Mekanik</option>
                    <option value="Operator">Operator</option>
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
                    name="password"
                    placeholder="password"
                    required
                />
                <div class="form-text">
                    Silahkan isi ulang password untuk pengguna
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
@endsection
