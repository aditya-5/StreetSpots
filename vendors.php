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
              let ii = i;
              markers[i].addListener("click",function(){
                 (function(){
                   setTimeout(function(){
                       $('#displayDetails').html('<div class="card" style="width: 32rem;"><img style="width:500px;height:400px;" src="'+data[ii].image+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+data[ii].name+'</h5><p class="card-text"><i class="fas fa-shopping-cart"></i> '+data[ii].description+'</p><p><i class="fas fa-map-marker-alt"></i> '+data[ii].address+'</p></div><div class="card-footer"><small class="text-muted"> <i class="fas fa-plus-square"></i> '+data[ii].date+'</small></div></div>')

                   },1);
               })();
              })

               infoWindows.push(new google.maps.InfoWindow({
                content:"<h5>"+data[i].name+"</h5>"
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
        <br><br><br><br>
        <div class="row  justify-content-center ">
          <div class="col pl-5">
            <center>
            <div id="map" style="height:400px;width:400px"></div><br><br>
            <div class="alert alert-info" style="font-size:0.4rem">
              <h4>The above map shows all the street vendors around you</h4>
            </div><br>
            <div class="alert alert-success" style="font-size:0.8rem">
              <h4>Drag around and click on the markers to view vendors</h4>
            </div>
          </center>
          </div>
          <div class="col " id="displayDetails">
          </div>
        </div>
   <br>



</body>


<?php include("footer.php")
 ?>
</html>
