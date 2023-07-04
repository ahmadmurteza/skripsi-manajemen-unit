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
    <div class="col-lg-8 mb-4 order-0">
        <div class="row">
            <div class="card mb-4">
                <div class="card-header"><span class="fw-semibold d-block mb-1">Lokasi</span></div>
                <div class="card-body">
                    <div id="mapid" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-dots-vertical-rounded"></i>
      </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Pengguna</span>
                        <h3 class="card-title mb-2">{{ $userTotal }}</h3>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span>Unit</span>
                        <h3 class="card-title text-nowrap mb-1">4,679</h3>

                    </div>
                </div>
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
        // Map BARU
        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                attribution: 'Map by <a href="https://maps.google.com/">Google</a>',
                
                subdomains:['mt0','mt1','mt2','mt3']
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });

        var mymap = L.map('mapid', {
            center: [-3.882066623633622, 114.83184814453126],
            zoom: 10,
            layers: [peta2]
        });

        var baseMaps = {
            "Default": peta2,
            "OpenStreetMap": peta3,
        };

        var greenIcon = new L.Icon({
            iconUrl: '/icons/car-accident.png',
            iconSize: [25, 25],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        L.control.layers(baseMaps).addTo(mymap);

        var progress = document.getElementById('progress');
        var progressBar = document.getElementById('progress-bar');

        function updateProgressBar(processed, total, elapsed, layersArray) {
            if (elapsed > 1000) {
                // if it takes more than a second to load, display the progress bar:
                progress.style.display = 'block';
                progressBar.style.width = Math.round(processed / total * 100) + '%';
            }

            if (processed === total) {
                // all markers processed - hide the progress bar:
                progress.style.display = 'none';
            }
        }

        var markers = L.markerClusterGroup({
            spiderfyOnMaxZoom: false,
            showCoverageOnHover: false,
            zoomToBoundsOnClick: true,
            chunkedLoading: true,
            chunkProgress: updateProgressBar,
            disableClusteringAtZoom: 20
        });

        var markerList = [];

        // menampilkan data pada map
        @foreach ($locations as $l)
            var lokasi = L.circle([{{ $l->latitude }}, {{ $l->longitude }}], {
                "radius": "{{ $l->radius }}",
                "fillColor": "#ff7800",
                "color": "#ff7800",
                "weight": 1,
                "opacity": 0.5,
                "fillOpacity":0.5,
                'strokeOpacity': 0.5
            }).addTo(mymap).bindPopup("<b>Area : {{ $l->nama_lokasi }} </b>");
        @endforeach

        @foreach ($warehouses as $warehouse)
            var lokasi = L.circle([{{ $warehouse->latitude }}, {{ $warehouse->longitude }}], {
                "radius": "1000",
                "fillColor": "#8bca84",
                "color": "#8bca84",
                "weight": 1,
                "opacity": 0.5,
                "fillOpacity":0.5,
                'strokeOpacity': 0.5
            }).addTo(mymap).bindPopup("<b>Area : {{ $warehouse->nama_gudang }} </b>");
        @endforeach

        @foreach ($units as $unit)
            @if ($unit->latitude != null && $unit->longitude != null)
                var lokasi = L.marker([{{ $unit->latitude }}, {{ $unit->longitude }}], {
                    icon: greenIcon
                }).addTo(mymap).bindPopup("<b>Nomor Lambung : {{ $unit->nomer_lambung }} </b>");
            @endif
        @endforeach

</script>
@endsection