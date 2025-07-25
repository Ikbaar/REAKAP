@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h2>Peta Semua Lokasi Petani</h2>

    <!-- OSM Map Only -->
    <div id="osm-map-container" style="height: 500px;" class="mb-3"></div>

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
document.addEventListener('DOMContentLoaded', () => {
    proj4.defs("UTM50N", "+proj=utm +zone=50 +datum=WGS84 +units=m +no_defs");

    const petaniData = @json($petanis);
    let map = L.map('osm-map-container').setView([-0.7893, 113.9213], 5); // Default center: Indonesia

    // Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Add markers
    petaniData.forEach(p => {
        if (p.point_x && p.point_y) {
            const [lng, lat] = proj4("UTM50N", "WGS84", [parseFloat(p.point_x), parseFloat(p.point_y)]);
            const marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup(`<strong>${p.name}</strong><br>Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`);
        }
    });
});
</script>
@endsection
