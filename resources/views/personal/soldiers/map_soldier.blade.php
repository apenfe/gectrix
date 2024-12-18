@props(['soldier'])

<div id="map" style="height: 400px; width: 400px;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([{{ $soldier->weapon->latitude }}, {{ $soldier->weapon->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $soldier->weapon->latitude }}, {{ $soldier->weapon->longitude }}]).addTo(map)
            .bindPopup('<b> {{ $soldier->tim }}</b>')
            .openPopup();

        var circle = L.circle([{{ $soldier->weapon->latitude }}, {{ $soldier->weapon->longitude }}], {
            color: 'blue',
            fillColor: '#30f',
            fillOpacity: 0.2,
            radius: {{ $soldier->weapon->maxRange }}
        }).addTo(map);
    });
</script>
