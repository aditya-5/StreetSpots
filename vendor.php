<?php
include("./login/server.php");
session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']==false){
	header("location: ./login/login.php");
	exit();
};

 ?>


 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script async
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9_2222347Z4XE4H6KD4l0wXVU1lTrnbg&callback=initMap">
</script>
    <script type="text/javascript">
    	function geocode(lat, lng){
				console.log(lat);
				console.log(lng);
    		axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
    			params:{
    				latlng:lat+','+lng,
    				key:'AIzaSyA9_2222347Z4XE4H6KD4l0wXVU1lTrnbg'
    			}
    		}).then(function(response){
    			document.getElementById('addr').value = response.data.results[0].formatted_address;
					console.log(response);
    		}).catch(function(error){
    			console.log(error);
    		});
    	}
			var markers=[];
			function initMap() {
		  const map = new google.maps.Map(document.getElementById("map"), {
		    zoom: 4,
		    center: { lat: -25.363882, lng: 131.044922 },
		  });


		  listener1 = map.addListener("click", (e) => {
		    placeMarkerAndPanTo(e.latLng, map);
		  });
		}

		function placeMarkerAndPanTo(latLng, map) {
			if(markers.length>0){
				setMapOnAll(null);
				markers = [];
			}
			// console.log(markers.length);
			console.log(markers);
		  marker = new google.maps.Marker({
		    position: latLng,
		    map: map,
		  });
			markers.push(marker);
			lat = marker.getPosition().lat();
			lng = marker.getPosition().lng();
			document.getElementById("lat").value= lat;
			document.getElementById("lng").value= lng;
		  map.panTo(latLng);
			geocode(lat, lng);
		}

		function setMapOnAll(map) {
		  for (let i = 0; i < markers.length; i++) {
		    markers[i].setMap(map);
		  }
	}

	function edit(){
		document.getElementById("addr").removeAttribute("readonly");
	}
    </script>
  </head>
  <body>
  	 <?php
	 include('header.php'); ?>


	 <div class="container p-3 middle">

 		<form action="vendor_form.php" method="POST">

 			<h2 class="text-center">Add Vendor</h2><br>

			<?php
			if(!empty($error)){
				echo "<div class='alert alert-warning' role='alert'>
	  $error
	</div>";
			} ?>

 			<div class="form-group">
 				<label for="name" class="form-label ">Vendor Name</label>
 				<input type="text" class="form-control" style="background-color:#dcfffb" id="name" name="name" placeholder="Enter vendor's name">
 			</div>

 			<div class="form-group">
 				<label for="desc" class="form-label">Description</label>
 				<input type="text" class="form-control" style="background-color:#dcfffb" id="desc" name="desc" placeholder="Enter what the vendor sells">
 			</div>

			<div class="row  justify-content-center ">
				<div class="col-lg-9">
					 <div id="map" style="height:400px;width:400px"></div>
				</div>
			</div>
			<br>


			<div class="row ">
				<div class="col-lg-6">
					<div class="form-group">
		 				<input type="text" class="form-control colorinput" style="background-color:#dcfffb" id="lat" name="lat" readonly="readonly" placeholder="Latitude">
		 			</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
		 				<input type="text" class="form-control" style="background-color:#dcfffb"  id="lng" name="lng" readonly="readonly" placeholder="Longitude">
		 			</div>
				</div>
			</div>




			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-secondary" onclick="edit()" style="background-color:#f8e9a1"  type="button">Edit</button>
			  </div>
			  <input type="text"   id="addr"  name="addr" readonly="readonly" class="form-control" placeholder="Address">
			</div>


 			<div class="row  justify-content-center">
				<div class="col-lg-6">
					<center>
					<div class="form-check form-check-inline">

							<input class="form-check-input" title="hello" type="radio" name="vol"  id="volatile" value="1">
							<label class="form-check-label"  for="volatile">Volatile</label>
						</div>
						</center>
				</div>
 				<div class="col-lg-6">
					<center>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="vol" id="involatile" value="2">
				  <label class="form-check-label" for="involatile">Involatile</label>
				</div>
				</div>
			</center>
			</div><br>

<div class="row">

<div class="col-lg-6">
	<div class="alert alert-info" role="alert"><center>
A volatile vendor is one which keeps changing locations</center>
</div>
</div>
<div class="col-lg-6">
		<div class="alert alert-info" role="alert"><center>
  An involatile vendor is one with a permanent location</center>
</div>
</div>
</div>



 			<br>
 			<div class="text-center">
	 			<button class="btn btn-primary" name="add_vendor" type="submit">Add</button>
 			</div>
 		</form>

 	</div>


<center>
    <h1>   </h1>
    <h1>Please make sure to follow the covid guidelines</h1>
    <h2>Wear a mask and maintain a good distance from others</h2></center><br>





  </body>
   <?php
 include('footer.php'); ?>
</html>
