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
    <div style="text-align:center;">
        <h2 style="margin: 0;">Rumah Sakit</h2>
        <span style="margin: 0;">Banjarbaru, Kalimantan Selatan</span>
    </div>
    <hr>
    <table style="" id="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>Kode Pasien</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>No Hp</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pasiens as $index => $pasien)
        <tr>
            <td><strong>{{ $index +1 }}</strong></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($pasien->kode_pasien) }}</strong></td>
            <th>{{ $pasien->nama_pasien }}</th>
            <th>{{ $pasien->alamat }}</th>
            <th>{{ $pasien->no_hp }}</th>
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
        <span style="margin-right: 50px;">Dokter: ...................</span>
    </div>
</body>
</html>