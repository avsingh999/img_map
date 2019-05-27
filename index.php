<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>


	<div class="container">
		<h1>IMG-FILE</h1>
		<div class="row">
			<form  class="form-field" enctype="multipart/form-data" action="" method='post'>
				  <div class="custom-file">
				    <input type="file" name="uploadfile" class="custom-file-input" id="validatedCustomFile" required>
				    <label class="custom-file-label" id="choosefile" for="validatedCustomFile">
				    		Choose file....
					</label>
				  </div>
	  			<input type="submit" id = "button" class="btn-primary" value="submit" name="submit" />
			</form>
		</div>
	</div>
	<script type="text/javascript">
	$(document).on('change', ':file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    	$("#choosefile").text(label);
	    console.log(label)
	});
	</script>


<?php
	$upload = 0;

if(isset($_POST["submit"])) {
	$filename  = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "images/".$filename;
	echo $folder;
	move_uploaded_file($tempname, $folder);
	echo "<br/>";
	$exif = exif_read_data("C:/Users/UIDAI/Downloads/av/t2.JPG", 0, true);

	function DMStoDD($deg,$min,$sec){
		// echo (((int)$min*60)+((int)$sec))/3600+$deg;
		echo "$deg+$min+$sec";
		echo "<br/>";
	    // Converting DMS ( Degrees / minutes / seconds ) to decimal format
	    return (int)$deg+((((int)$min*60)+((int)$sec))/3600);
	}
	$lat_deg_arr = explode("/",$exif["GPS"]["GPSLatitude"][0]);
	$lat_min_arr = explode("/",$exif["GPS"]["GPSLatitude"][1]);
	$lat_sec_arr = explode("/",$exif["GPS"]["GPSLatitude"][2]);
	$long_deg_arr = explode("/",$exif["GPS"]["GPSLongitude"][0]);
	$long_min_arr = explode("/", $exif["GPS"]["GPSLongitude"][1]); 
	$long_sec_arr = explode("/", $exif["GPS"]["GPSLongitude"][2]);

	$lat_deg = (float) ((float)$lat_deg_arr[0]/(float)$lat_deg_arr[1]);
	$lat_min = (float) ((float)$lat_min_arr[0]/(float)$lat_min_arr[1]);
	$lat_sec = (float) ((float)$lat_sec_arr[0]/(float)$lat_sec_arr[1]);

	$long_deg = (float) ((float)$long_deg_arr[0]/(float)$long_deg_arr[1]);
	$long_min = (float) ((float)$long_min_arr[0]/(float)$long_min_arr[1]);
	$long_sec = (float) ((float)$long_sec_arr[0]/(float)$long_sec_arr[1]);

	$latitude = DMStoDD($lat_deg, $lat_min, $lat_sec);
	$longitude = DMStoDD($long_deg, $long_min, $long_sec);
	$_SESSION['lat'] = $latitude;
	$_SESSION['long'] = $longitude;
	echo "$latitude, $longitude";

	$upload = 1;
}
else{
	$filename = "";
}

?>
<?php  if ($upload==1){ ?>
<a href="map.php">next</a>;

<?php }?>
</body>
</html>
