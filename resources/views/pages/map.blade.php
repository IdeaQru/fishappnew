@extends('layouts.app')

@section('title', 'Map Page')

@section('css')
<!-- Menambahkan CSS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="anonymous" />
<link rel="stylesheet"
    href="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css" />
<style>
  #map {
        height: 600px;  /* Ensure the map container has a height */
        width: 100%;    /* Ensure the map container has a width */
    }

    .legend {
        background: white;
        padding: 10px;
        line-height: 1.4;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        width: 250px;
        font-size: 12px; /* Mengurangi ukuran font */
        bottom: 50px;
        left: 10px;
        position: absolute;
        z-index: 1000;
    }

    .legend h4 {
        margin: 0 0 5px;
        font-size: 14px; /* Mengurangi ukuran font judul */

}


    .legend h4 {
        margin: 0 0 5px;
    }
</style>
@endsection
@include('component.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Peta Persebaran Ikan</div>
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('component.logger')

@endsection

@push('javascript')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js"></script>
<script>
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    var Stadia_Dark = L.tileLayer(
        'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });

    var Esri_WorldStreetMap = L.tileLayer(
        'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
    });

    var map = L.map('map', {
        center: [-7.2620965, 112.8607716],
        zoom: 8,
        layers: [osm],
        fullscreenControl: true,  // Enable fullscreen control
        fullscreenControlOptions: {
            position: 'topright'
        }
    });

    const baseLayers = {
        'OpenStreetMap': osm,
        // 'Stadia Dark': Stadia_Dark,
        'Esri WorldStreetMap': Esri_WorldStreetMap
    };
    const layerControl = L.control.layers(baseLayers).addTo(map);
    var legend = L.control({ position: 'bottomleft' });

legend.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'legend');
    div.innerHTML = `
        <h4>Location Info</h4>
        <b>Total Locations: <span id="total-locations"></span></b><br>
        <b><i class="fa fa-circle" style="color: green;"></i> Daerah Potensial: <span id="potensial-count"></span></b><br>
        <b><i class="fa fa-circle" style="color: yellow;"></i> Prediksi Berpotensi: <span id="prediksi-count"></span></b><br>
        <b><i class="fa fa-circle" style="color: red;"></i> Daerah Potensial Sedang: <span id="kurang-potensial-count"></span></b>
    `;
    return div;
};
legend.addTo(map);

// Fetch data from the server and plot circles
fetch('/map/data')
    .then(response => response.json())
    .then(data => {
        console.log('Fetched data:', data); // Log the fetched data for debugging

        var totalLocations = data.length;
        var potensialCount = data.filter(location => location.status === 'potensial').length;
        var prediksiCount = data.filter(location => location.status === 'prediksiberpotensi').length;
        var tidakPotensialCount = data.filter(location => location.status === 'kurangpotensial').length;

        document.getElementById('total-locations').textContent = totalLocations; // Set total locations
        document.getElementById('potensial-count').textContent = potensialCount; // Set potensial locations
        document.getElementById('prediksi-count').textContent = prediksiCount; // Set prediksi locations
        document.getElementById('kurang-potensial-count').textContent = tidakPotensialCount; // Set kurang potensial locations

        if (Array.isArray(data) && data.length > 0) {
            data.forEach(function (location) {
                if (location.latitude && location.longitude) {
                    var lng = parseFloat(location.longitude);
                    var lat = parseFloat(location.latitude);
                    console.log('Adding circle at:', lng, lat); // Log the latitude and longitude

                    // Ensure latitude and longitude are valid
                    if (!isNaN(lat) && !isNaN(lng)) {
                        // Set circle color based on status
                        var circleColor;
                        if (location.status === 'potensial') {
                            circleColor = 'green';
                        } else if (location.status === 'prediksiberpotensi') {
                            circleColor = 'yellow';
                        } else {
                            circleColor = 'red';
                        }

                        var circle = L.circle([lat, lng], {
                            color: circleColor,
                            fillColor: circleColor,
                            fillOpacity: 0.5,
                            radius: 200
                        }).addTo(map);

                        circle.bindPopup(`
                            <strong>Lokasi:</strong> ${location.lokasi || "No location specified"}<br>
                            <strong>Latitude:</strong> ${lat}<br>
                            <strong>Longitude:</strong> ${lng}<br>
                            <strong>Status:</strong> ${location.status}
                        `);
                    } else {
                        console.warn('Invalid latitude or longitude:', lat, lng);
                    }
                } else {
                    console.warn('Invalid location data:', location);
                }
            });
        } else {
            console.error('No locations data available or invalid format:', data);
        }
    })
    .catch(error => {
        console.error('Error fetching locations data:', error);
    });

</script>

@endpush
