<?php include("header.php")
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSpots</title>

    
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9_2222347Z4XE4H6KD4l0wXVU1lTrnbg&callback=initMap">
</script>
<script >
  function initMap(){
    var options = {
      zoom: 8,
      center: {lat:42.3601,lng:-71.0589}
    }

    var map = new google.maps.Map(document.getElementById('map'), options)


    var marker = new google.maps.Marker({
      position:{lat:42.4667, lng:-70.9495},
      map:map,
      icon:"",

    })

    var infoWindow = new google.maps.InfoWindow({
      content:"<h1> Hello</h1>"
    });

    marker.addListener('click', function(){
      infoWindow.open(map, marker);
    })

    var marker2 = new google.maps.Marker({
      position:{lat:41, lng:-67},
      map:map
    })

  }
</script>
</head>

<body>




      <div class="mainHeader" >
    <div class="row justify-content-center" style="padding-top:40px" >
      <div class="col-lg-8">
        <div class="alert alert-info" >
          <h4>The below map shows all the street vendors around you</h4>
        </div>
        </div>
    </div>

     <div class="row justify-content-center" >
      <div class="col-lg-8">
        <div class="alert alert-success" >
          <h4>Drag around the map and click on the vendors to know more about them</h4>
        </div>
        </div>
    </div>




      <div class="row  justify-content-center">
         <div id="map" style="height:400px;width:400px"></div>
      </div>
         
    
   <br>



</section>
</body>


<?php include("footer.php")
 ?>
</html>
