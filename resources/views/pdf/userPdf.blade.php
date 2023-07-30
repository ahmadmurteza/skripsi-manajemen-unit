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
      font-size: 12px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
</style>
<body>
    <img src="{{ public_path('assets/img/icons/download.png') }}" alt="" style="position: absolute; margin-left: 40px; height: 50px; width: 50px;">
    <div style="text-align:center; margin-left: 100px; margin-bottom: 25px;">
        <h2 style="margin: 0;">PT. Borneo Indobara</h2>
        <span style="margin: 0;">Angsana, Kec. Angsana, Kabupaten Tanah Bumbu, Kalimantan Selatan</span>
    </div>
    <hr>
    <table style="" id="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Role App</th>
            <th>No Whatsapp</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td><strong>{{ $index +1 }}</strong></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($user->name) }}</strong></td>
                <td>{{ $user->nama_lokasi }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->jabatan }}</td>
                @if ($user->role == 'ho')
                <td><span class="badge bg-label-primary me-1">{{ $user->role }}</span></td>
                @elseif ($user->role == 'planner')
                <td><span class="badge bg-label-secondary me-1">{{ $user->role }}</span></td>
                @elseif ($user->role == 'mekanik')
                <td><span class="badge bg-label-danger me-1">{{ $user->role }}</span></td>
                @elseif ($user->role == 'operator')
                <td><span class="badge bg-label-warning me-1">{{ $user->role }}</span></td>
                @endif
                <td>{{ $user->no_wa }}</td>
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