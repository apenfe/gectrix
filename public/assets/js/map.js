let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: 40.748817,
      lng: -73.985428
    },
    zoom: 12,
    scrollwheel: false,
  });
}

initMap();