<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

<script>
    // Creating map options
    var mapOptions = {
        center: [1.0797, 104.0137],
        zoom: 12

    }

    // Creating a map object
    var map = new L.map('map', mapOptions);

    // Creating a Layer object
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    // Adding layer to the map
    map.addLayer(layer);
</script>
</body>

</html>