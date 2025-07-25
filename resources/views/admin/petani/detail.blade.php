@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Lokasi</h2>

    <!-- Info Petani -->
    <div class="mb-3">
        <strong>Nama:</strong> {{ $petani->name }}
    </div>

    <!-- Koordinat -->
    <div class="mb-3">
        <strong>Koordinat (UTM):</strong>
        X: {{ $petani->point_x ?? '-' }}, Y: {{ $petani->point_y ?? '-' }}
        <br>
        <strong>Lat/Lng:</strong> <span class="latlng-konversi">sedang menghitung...</span>
    </div>

    <!-- Dropdown Pilih Tipe Map -->
    <div class="mb-3">
        <label for="map-type"><strong>Pilih Tampilan Peta:</strong></label>
        <select id="map-type" class="form-select w-auto">
            <option value="" disabled selected>Pilih salah satu</option>
            <option value="gmaps">Google Maps</option>
            <option value="osm">OSM Map (Custom)</option>
            <option value="gearth">Google Earth</option>
        </select>
    </div>

    <!-- OSM Map -->
    <div id="osm-map-container" class="mb-3 d-none" style="height: 400px; border: 1px solid #ccc;">
        <div id="osm-map" style="height: 100%;"></div>
    </div>

    <!-- Google Maps iframe -->
    <div id="gmaps-container" class="ratio ratio-16x9 d-none mb-3">
        <iframe id="gmaps-iframe" src="" style="border:0;" allowfullscreen loading="lazy"></iframe>
    </div>

    <!-- Google Earth -->
    <div id="gearth-container" class="d-none mb-3">
        <a id="gearth-link" href="#" target="_blank" class="btn btn-danger">
            <i class="bi bi-globe"></i> Buka di Google Earth
        </a>
    </div>

    <!-- Tombol Kembali -->
    <a href="{{ route('admin.petani.index') }}" class="btn btn-outline-primary mt-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>
@endsection

@section('scripts')
<!-- Proj4JS -->
<script src="https://cdn.jsdelivr.net/npm/proj4@2.8.0/dist/proj4.min.js"></script>

<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    let lat = null;
    let lng = null;

    @if(is_numeric($petani->point_x) && is_numeric($petani->point_y))
        proj4.defs("UTM50N", "+proj=utm +zone=50 +datum=WGS84 +units=m +no_defs");
        const utmX = {{ $petani->point_x }};
        const utmY = {{ $petani->point_y }};
        const latlon = proj4("UTM50N", "WGS84", [utmX, utmY]);
        lat = latlon[1];
        lng = latlon[0];
    @elseif(is_numeric($petani->latitude) && is_numeric($petani->longitude))
        lat = {{ $petani->latitude }};
        lng = {{ $petani->longitude }};
    @endif

    document.addEventListener("DOMContentLoaded", () => {
        const latlngSpan = document.querySelector('.latlng-konversi');
        const osmContainer = document.getElementById('osm-map-container');
        const gmapsContainer = document.getElementById('gmaps-container');
        const gearthContainer = document.getElementById('gearth-container');
        const mapTypeSelect = document.getElementById('map-type');

        if (lat && lng) {
    latlngSpan.innerText = `Lat: ${lat.toFixed(6)}, Lng: ${lng.toFixed(6)}`;

    // Set Google Maps iframe
    document.getElementById('gmaps-iframe').src = `https://maps.google.com/maps?q=${lat},${lng}&z=15&output=embed`;

    // Set Google Earth link
    const gearthLink = document.getElementById('gearth-link');
    gearthLink.href = `https://earth.google.com/web/@${lat},${lng},1000a,0d,60y,0h,0t,0r`;

    // Tampilkan Google Maps secara default
    gmapsContainer.classList.remove('d-none');
    mapTypeSelect.value = 'gmaps';

    // Initialize OSM Map (tapi tetap sembunyi dulu, nunggu dipilih)
    let osmMap = null;
    mapTypeSelect.addEventListener('change', function () {
        osmContainer.classList.add('d-none');
        gmapsContainer.classList.add('d-none');
        gearthContainer.classList.add('d-none');

        if (this.value === 'osm') {
            osmContainer.classList.remove('d-none');
            if (!osmMap) {
                osmMap = L.map('osm-map').setView([lat, lng], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
                }).addTo(osmMap);
                L.marker([lat, lng]).addTo(osmMap).bindPopup("Lokasi Petani: {{ $petani->name }}").openPopup();
            } else {
                osmMap.invalidateSize();
            }
        } else if (this.value === 'gmaps') {
            gmapsContainer.classList.remove('d-none');
        } else if (this.value === 'gearth') {
            gearthContainer.classList.remove('d-none');
        }
    });
}

    });
</script>
@endsection
