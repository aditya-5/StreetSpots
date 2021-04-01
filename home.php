<?php include("header.php")
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StreetSpots</title>


</head>

<body>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/img/slide/1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/slide/2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/slide/3.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/slide/4.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


      <div class="mainHeader">
        <div>



<div>




   <div class="jumbotron" style="margin-bottom:0px">
  <h1 class="display-4">What is StreetSpots?</h1>
  <p class="lead">StreetSpots aims at promoting social good by supporting the local street vendors around us. It allows you to add information about a street vendor you spotted, view information about that vendor. It uses interactive maps provided by Google Maps API to provide a vibrant user experience. </p>

  <a class="btn btn-primary btn-lg" href="./maps" role="button">Look for vendors around you</a>
</div>


 <div class="jumbotron " style="margin-top:0px; margin-bottom:0px; background-color:#ffe2e6">
  <h1 class="display-4">Why support the Street Vendors?</h1>
  <p class="lead">Street vending enlivens urban public spaces and increases public safety by making streets vibrant and welcoming, Promoting street vending can generate employment, keep people safe and create the vitality and comity which is the hallmark of livable humane cities. Moreover, we need to be there for these people in this era where the Big Tech Giants are eating up small businesses.</p>
</div>
 <div class="jumbotron " style="margin-top:0px; margin-bottom:0px">
  <h1 class="display-4">How to add street vendors?</h1>
  <p class="lead">It couldn't be more simple. Just <a href="./login/login">Login/Register</a> and go to <a href="./vendor">Add Vendors</a> page. Fill in the form and wait for the approval.  </p>
</div>

<div class="jumbotron " style="margin-top:0px; margin-bottom:0px;background-color:#ffe2e6">
  <h1 class="display-4">What all information is available?</h1>
  <p class="lead">As of now, the app allows you to add the vendor's general details such as the name, address, description. In the future, we aim to extend the functionality in the following ways-
    <ul style="color:black">
    <li>
      Allow users to review the vendors
    </li><br>
    <li>
      Allow users to add images
    </li><br>
    <li>
      Allow users to mark the vendor volatile/involatile
    </li><br>

  </ul>
  </p>



</div>



<br>

</body>


<?php include("footer.php")
 ?>


</html>
