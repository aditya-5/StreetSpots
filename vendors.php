<?php include("header.php");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSpots</title>


    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9_2222347Z4XE4H6KD4l0wXVU1lTrnbg&callback=gett">
</script>
<script >

var user_lat;
var user_lon;
function gett() {
        var startPos;
        var geoSuccess = function(position) {
          startPos = position;
          document.getElementById('startLat').innerHTML = startPos.coords.latitude;
          document.getElementById('startLon').innerHTML = startPos.coords.longitude;
          user_lon = startPos.coords.longitude;
          user_lat = startPos.coords.latitude;
        };
        navigator.geolocation.getCurrentPosition(geoSuccess);
        setTimeout(function(){
          initMap(user_lat,user_lon);
        }
        , 4000);

    };

function initMap(a,b){
  if(isNaN(a)||isNaN(b)){
    a = 53.4668;
    b = -2.2339;
  }
  var options = {
    zoom: 12,
    center: { lat: parseFloat(a), lng: parseFloat(b) }
  }

var map = new google.maps.Map(document.getElementById('map'), options);
var markers = [];
var infoWindows = [];
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "get_data.php";
var asynchronous = true;
var data;
ajax.open(method, url, asynchronous);
ajax.send();
ajax.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    data = JSON.parse(this.responseText);


    for(var i=0;i<data.length;i++){
              markers.push(new google.maps.Marker({
                position:{lat:parseFloat(data[i].lat), lng:parseFloat(data[i].lng)},
                map:map,
                icon:"",
              }));

               infoWindows.push(new google.maps.InfoWindow({
                content:"<h5>"+data[i].description+"</h5>"
              }));
              try{throw i}
              catch(ii){
                markers[ii].addListener('click', function(){
                  infoWindows[ii].open(map, markers[ii]);
                })
              }


    }




  }
}

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
