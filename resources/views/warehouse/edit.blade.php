@extends('layouts.layout') 
@section('style')
    {{--  Map  --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/MarkerCluster.css"
    crossorigin="" />
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/MarkerCluster.Default.css"
    crossorigin="" />
@endsection

@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">Lokasi MAP</div>
            <div class="card-body">
                <div id="mapid" style="height: 600px;"></div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tambah Data</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('warehouse.update', $warehouse->id ) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname"
                            >Nama Lokasi</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="basic-default-fullname"
                            placeholder="PIT A, PIT B, PIT C, ..."
                            name="nama_gudang"
                            value="{{ $warehouse->nama_gudang }}"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email"
                            >Longitude</label
                        >
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                id="longitude"
                                class="form-control"
                                placeholder="-3.4572xxx"
                                aria-label="john.doe"
                                aria-describedby="basic-default-email2"
                                name="longitude"
                                value="{{ $warehouse->longitude }}"
                                required
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname"
                            >Latitude</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="latitude"
                            placeholder="114.810xxx"
                            name="latitude"
                            value="{{ $warehouse->latitude }}"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname"
                            >Pemilik</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="penanggung_jawab"
                            placeholder="Perusahaan, Nama orang, ..."
                            name="penanggung_jawab"
                            value="{{ $warehouse->penanggung_jawab }}"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname"
                            >Deskripsi</label
                        >
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control">{{ $warehouse->deskripsi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/leaflet.markercluster.js"
crossorigin=""></script>

<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [{{$warehouse->latitude}}, {{$warehouse->longitude}}];
    }

    var map = L.map('mapid').setView([{{$warehouse->latitude}}, {{$warehouse->longitude}}], 15);

    L.tileLayer(
        'https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            attribution: 'Map by <a href="https://maps.google.com/">Google</a>',                
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'   
        }).bindPopup(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng).keyup();
    });

    $("#lat,#long").change(function() {
        var position = [parseInt($("#lat").val()), parseInt($("#long").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });

    map.addLayer(marker);
</script>
@endsection
