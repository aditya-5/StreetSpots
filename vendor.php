<?php

session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']==false){
	header("location: ./login/login.php");
	exit();
}

 ?>


 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
    	geocode();
    	function geocode(){
    		axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
    			params:{
    				address:'Moti vihar society, kanpur',
    				key:'AIzaSyA9_2222347Z4XE4H6KD4l0wXVU1lTrnbg'
    			}
    		}).then(function(response){
    			console.log(response);
    		}).catch(function(error){
    			console.log(error);
    		})
    	}
    </script>
  </head>
  <body>
  	 <?php
	 include('header.php'); ?>


	 <div class="container p-3 middle">

 		<form action="vendor_submit.php" method="POST">

 			<h2 class="text-center">Add Vendor</h2><br>

 			<div class="form-group">
 				<label for="name" class="form-label">Vendor Name</label>
 				<input type="text" class="form-control" id="name" name="name" placeholder="Enter vendor's name">
 			</div>

 			<div class="form-group">
 				<label for="address" class="form-label">Vendor Address</label>
 				<input type="text" class="form-control" id="address" name="address" placeholder="Enter vendor's address">
 			</div>

 			<div class="form-group">
 				<label for="desc" class="form-label">Description</label>
 				<input type="text" class="form-control" id="desc" name="desc" placeholder="Enter what the vendor sells">
 			</div>

 			<div class="row  justify-content-center">
 			<div class="form-check form-check-inline">

				  <input class="form-check-input" type="radio" name="vol"  id="volatile" value="volatile">
				  <label class="form-check-label" for="volatile">Volatile</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="vol" id="involatile" value="involatile">
				  <label class="form-check-label" for="involatile">Involatile</label>
				</div>
			</div>


 			<br>
 			<div class="text-center">
	 			<button class="btn btn-primary">Add</button>
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
