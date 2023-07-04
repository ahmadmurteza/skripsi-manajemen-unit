


<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ config('app.name', 'Laravel') }} || Laravel</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container">
      
      <span class="app-brand-text demo text-body fw-bolder">{{ config('app.name', 'Laravel') }} Pelaporan Kerusakan</span>
      
      @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
      @endif
      <div class="row">
        <div class="col">
          <form action="{{ route('incident.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-company"
                  >Unit</label
              >
              <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="master_unit_id" required>
                  <option value="" selected disabled>Pilih Salah Satu</option>
                  @foreach ($units as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->nomer_lambung }}</option>                          
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
                      <option value="{{ $location->id }}">{{ $location->nama_lokasi }}</option>                          
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
                  placeholder="Mati, Low Machine, ..."
                  required
              />
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
                  required
              />
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Kirim</button>
        </div>
        <div class="col"> 
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

          <button class="btn btn-warning d-grid w-100" type="btn" onclick="getLocation()">Lokasi Sekarang</button>
        </div>
      </div>
    </div>
    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      var x = document.getElementById("location");
      let long = document.getElementById("longitude");
      let lat = document.getElementById("latitude");
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }
      
      function showPosition(position) {
        $("#longitude").val(position.coords.longitude);
        $("#latitude").val(position.coords.latitude);
      }
    </script>
  </body>
</html>
