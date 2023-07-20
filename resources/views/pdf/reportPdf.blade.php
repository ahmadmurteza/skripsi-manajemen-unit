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
            <th>Waktu Insiden</th>
            <th>Nomer Lambung</th>
            <th>Nama Lokasi</th>
            <th>Pengadu</th>
            <th>Kerusakan</th>
            <th>Status</th>
            <th>Prioritas</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($reports as $index => $report)
            <tr>
                <td><strong>{{ $index +1 }}</strong></td>
                <td>{{  $report->waktu_insiden  }}</td>
                <td><strong>{{ $report->nomer_lambung }}</strong></td>
                <td>{{ $report->nama_lokasi }}</td>
                <td>{{ $report->pengadu }}</td>
                <td>{{ $report->kerusakan }}</td>
                <td>
                    @if ($report->status == 'rendah')
                    <span class="badge bg-primary">{{ $report->prioritas }}</span>
                    @elseif($report->status == 'sedang')
                    <span class="badge bg-warning">{{ $report->prioritas }}</span>
                    @else
                    <span class="badge bg-secondary">{{ $report->prioritas }}</span>
                    @endif
                </td>
                <td>
                    @if ($report->status == 'selesai')
                    <span class="badge bg-primary">{{ $report->status }}</span>
                    @elseif($report->status == 'proses')
                    <span class="badge bg-warning">{{ $report->status }}</span>
                    @else
                    <span class="badge bg-secondary">{{ $report->status }}</span>
                    @endif
                </td>
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