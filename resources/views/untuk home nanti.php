
@foreach ($units as $unit)
@if ($unit->latitude != null && $unit->longitude != null)
    var data = "<b> Nama Unit: {{ $unit->nama_unit }} </b></br>" +
        "Lokasi : {{ $unit->nama_lokasi }}</br>" +
        "Nomor Serial : {{ $unit->no_serial }}</br>" +
        "Nomor Lambung : {{ $unit->no_lambung }}</br>" +
        "Kepemilikan Unit : {{ $unit->status_kepemilikan }}";
    var marker = L.marker(L.latLng({{ $unit->latitude }}, {{ $unit->longitude }}), {
        icon: greenIcon
    });
    marker.bindPopup(data);
    markers.addLayers(marker);
    mymap.addLayer(markers);
@endif
@endforeach


{{-- untuk di home pas sudah ada unitnya --}}