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
    <div class="container">
      
      <span class="app-brand-text demo text-body fw-bolder">{{ config('app.name', 'Laravel') }} Pelaporan Kerusakan</span>
      
      @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
      @endif
      
      <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header">Lokasi MAP</div>
                <div class="card-body">
                    <div id="mapid" style="height: 600px;"></div>
                </div>
            </div>
        </div>
        <div class="col">
          <form action="" method="post" enctype="multipart/form-data" >
            <div class="mb-3">
              <label class="form-label" for="basic-default-company"
                  >Unit</label
              >
              <select class="form-select" 
                id="exampleFormControlSelect1" 
                aria-label="Default select example" 
                name="master_unit_id" 
                id="master_unit_id" 
                required
                onchange="changeUnit(this)"
                >
                  <option value="" selected disabled>Pilih Salah Satu</option>
                  @foreach ($units as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->nomer_lambung }}</option>                          
                  @endforeach
              </select>
              
              <small class="text-danger">Isi sebelum pakai</small>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                    >HM/KM Terakhir</label
                >
                <input
                    type="number"
                    class="form-control"
                    name="hm"
                    id="hm"
                    placeholder="250, 150, ..."
                    required
                />
                <small class="text-danger">Isi sebelum dan sesudah pakai</small>
            </div>
            {{-- <button type="submit" class="btn btn-primary mb-5">Pakai</button> --}}
            <button type="button" class="btn btn-danger mb-5" onclick="pakai()">Keluar</button>
            
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname"
                >Longitude</label
            >
            <input
                type="text"
                class="form-control"
                name="longitude"
                id="longitude"
                placeholder="-3.42342xxxx"
                readonly
                required
            />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname"
                >Latitude</label
            >
            <input
                type="text"
                class="form-control"
                name="latitude"
                id="latitude"
                placeholder="-3.42342xxxx"
                readonly
                required
            />
          </div>
        </form>

          {{-- <button class="btn btn-warning d-grid w-100" type="btn" onclick="getLocation()">Lokasi Sekarang</button> --}}
        </div>
      </div>
    </div>
@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/leaflet.markercluster.js"
crossorigin=""></script>



 <!-- Place this tag in your head or just before your close body tag. -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>


      let curLocation = [0, 0];
      if (curLocation[0] == 0 && curLocation[1] == 0) {
          curLocation = [-3.426238, 114.8211279];
      }

      let map = L.map('mapid').setView([-3.426238, 114.8211279], 15);

      L.tileLayer(
          'https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
              attribution: 'Map by <a href="https://maps.google.com/">Google</a>',                
              subdomains:['mt0','mt1','mt2','mt3']
          }).addTo(map);

      map.attributionControl.setPrefix(false);

      let marker = new L.marker(curLocation, {
          draggable: 'true'
      });

      marker.on('dragend', function(event) {
          let position = marker.getLatLng();
          marker.setLatLng(position, {
              draggable: 'true'   
          }).bindPopup(position).update();
          $("#latitude").val(position.lat);
          $("#longitude").val(position.lng).keyup();
      });

      $("#lat,#long").change(function() {
          let position = [parseInt($("#lat").val()), parseInt($("#long").val())];
          marker.setLatLng(position, {
              draggable: 'true'
          }).bindPopup(position).update();
          map.panTo(position);
      });

      map.addLayer(marker);

    let unitId = null;
    function changeUnit(unit) {
        // check type data
        let checkId = typeof unit;
        if (checkId === "number") {
            let id = unit;
            unitId = id;
        } else if (checkId === "object") {
            let id = unit.value;
            unitId = id;
        } else if (checkId === "string") {
            let id = parseInt(unit);
            unitId = id;
        } 
        // console.log(unit);
        if (unitId != null) {
            // memperbaharui marker 
            let x = document.getElementById("location");
            let long = document.getElementById("longitude");
            let lat = document.getElementById("latitude");
            function getLocation() {
                console.log("5 detik");
                if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }
            
            function showPosition(position) {
                $("#longitude").val(position.coords.longitude);
                $("#latitude").val(position.coords.latitude);
                curLocation = [position.coords.latitude, position.coords.longitude];
                marker.setLatLng(curLocation);

                

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

                $.ajax({ 
                    type: "POST", 
                    url: "{{route('unit.info.location')}}",               
                    data:{id: unitId, lat: position.coords.latitude, long: position.coords.longitude},
                    success: function(result) {
                        console.log(result);
                    }
                
                });

            }

            getLocation();
        }
        // console.log($("#master_unit_id :selected").val());
        
    }

    function pakai() {
        let hm = $("#hm").val();
        let lat = $("#longitude").val();
        let long = $("#latitude").val();
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({ 
            type: "POST", 
            url: "{{route('unit.info.keluar')}}",               
            data:{id: unitId, lat: lat, long: long, hm: hm},
            success: function(result) {
                console.log(result);
                window.location = "{{route('unit.update.location')}}";
            }
        
        });
    }
    
    // perulangan update
    setInterval(() => {
        changeUnit(unitId);
    }, 5000);

</script>
@endsection