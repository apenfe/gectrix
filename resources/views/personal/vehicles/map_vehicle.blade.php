@props(['vehicle'])

<div id="map" style="height: 400px; width: 400px;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([{{ $vehicle->latitude }}, {{ $vehicle->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $vehicle->latitude }}, {{ $vehicle->longitude }}]).addTo(map)
            .bindPopup('<b> {{ $vehicle->model }}</b>')
            .openPopup();

        var circle = L.circle([{{ $vehicle->latitude }}, {{ $vehicle->longitude }}], {
            color: 'blue',
            fillColor: '#30f',
            fillOpacity: 0.2,
            radius: {{ $vehicle->weapon->maxRange }}
        }).addTo(map);
    });
</script>
