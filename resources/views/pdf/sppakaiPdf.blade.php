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
            <th>Gudang</th>
            <th>Tanggal Dipakai</th>
            <th>Deskripsi</th>
            <th>Nomer Part</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
            <th>Suplier</th>
            <th>Nomer PO</th>
            <th>Penerima</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($spareparts as $index => $sparepart)
            <tr>
                <td><strong>{{ $index +1 }}</strong></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($sparepart->nama_gudang) }}</strong></td>
                <td>{{ $sparepart->tanggal_dipakai }}</td>
                <td>{{ $sparepart->deskripsi }}</td>
                <td>{{ $sparepart->nomor_part }}</td>
                <td>{{ $sparepart->jumlah }}</td>
                <td>{{ $sparepart->harga_satuan }}</td>
                <td>{{ $sparepart->total }}</td>
                <td>{{ $sparepart->suplier }}</td>
                <td>{{ $sparepart->nomor_po }}</td>
                <td>{{ $sparepart->penerima }}</td>
                <td>{{ $sparepart->status }}</td>
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