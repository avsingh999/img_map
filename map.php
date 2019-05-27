<html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
   <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
   <style>
       #map{ height: 75% }
   </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

  
    <div id="map" style="border: 3px solid #FFD9D9;">   <script type="text/javascript">
    <?php session_start(); ?>
    <?php echo 'var lat = "'.json_encode($_SESSION['lat']).'";';?>
    <?php echo 'var long = "'.json_encode($_SESSION['long']).'";';?>
     var map = L.map('map').setView([lat, long], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    console.log(lat)
    L.marker([lat, long]).addTo(map)
      .bindPopup( lat+", "+long);
   </script>
   </div>
 
   <div class="container" style="margin: 30px;">
     <a href="index.php"  class="btn btn-info" role="button">Back</a>

   </div>
</body>
</html>