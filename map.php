
<html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
   <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
   <style>
       #map{ height: 50% }
   </style>
</head>
<body>

  
    <div id="map"></div>
    <script type="text/javascript">
    <?php session_start(); ?>
    <?php echo 'var lat = "'.json_encode($_SESSION['lat']).'";';?>
    <?php echo 'var long = "'.json_encode($_SESSION['long']).'";';?>
     var map = L.map('map').setView([lat, long], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, long]).addTo(map)
      .bindPopup(lat+", "+long)
      .openPopup();
   </script>
   <a href="index.php">Back</a>
</body>
</html>
