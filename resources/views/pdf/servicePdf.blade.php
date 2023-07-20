<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Unit</title>
</head>
<style>
    table, td, th {
      border: 1px solid;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
</style>
<body>
    <img src="{{ public_path('assets/img/elements/2.ico') }}" alt="" style="position: absolute; margin-left: 40px;">
    <div style="text-align:center; margin-left: 100px; margin-bottom: 25px;">
        <h2 style="margin: 0;">PT. Borneo Indobara</h2>
        <span style="margin: 0;">Angsana, Kec. Angsana, Kabupaten Tanah Bumbu, Kalimantan Selatan</span>
    </div>
    <hr>
    <table style="" id="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>Penganggung Jawab</th>
            <th>Deskripsi</th>
            <th>Sparepart yang Diperlukan</th>
            <th>HM Triger</th>
            <th>Jenis Unit</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($services as $index => $service)
        <tr>
            <td><strong>{{ $index +1 }}</strong></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($service->penanggung_jawab) }}</strong></td>
            <td>{{ $service->deskripsi }}</td>
            <td>{{ $service->sparepart }}</td>
            <td>{{ $service->hm }}</td>
            <td>{{ $service->jenis_unit }}</td>
        </tr>
        @endforeach
        
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @php
       setlocale(LC_TIME, 'id_ID');
       \Carbon\Carbon::setLocale('id');
    @endphp
    <div style="text-align: right;">
        <span style="text-align: center;">Banjarbaru, {{ now()->translatedFormat('l j, F Y'); }}</span>
        <br>
        <br>
        <br>
        <br>
        <span style="margin-right: 50px;">HO: ...................</span>
    </div>
</body>
</html>