<!DOCTYPE html>
<html>
<head>
    <title>Peta Desa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #mapid { height: 500px; }
    </style>
</head>
<body>
    <div id="mapid"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('mapid').setView([-8.25, 112.12], 15); // Ganti dengan koordinat desa Anda
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(mymap);
    </script>
</body>
</html>