@props(['weapon'])

<div id="map" style="height: 400px; width: 400px;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([{{ $weapon->latitude }}, {{ $weapon->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $weapon->latitude }}, {{ $weapon->longitude }}]).addTo(map)
            .bindPopup('<b>{{ $weapon->brand }} {{ $weapon->model }}</b><br />{{ $weapon->type }}<br />{{ $weapon->deviceId }}')
            .openPopup();

        var circle = L.circle([{{ $weapon->latitude }}, {{ $weapon->longitude }}], {
            color: 'blue',
            fillColor: '#30f',
            fillOpacity: 0.2,
            radius: {{ $weapon->maxRange }}
        }).addTo(map);
    });
</script>
