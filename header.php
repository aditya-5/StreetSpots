<?php
session_start();
$log = false;
if(isset($_SESSION['loggedin'])){
  if($_SESSION['loggedin']==true){
  	$fname = $_SESSION['first_name'];
    $lname = $_SESSION['last_name'];
    $log = true;
  }
}
 ?>

 <head>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <link rel="icon" href="./assets/favicon.png">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/c4b713ed09.js" crossorigin="anonymous"></script>
   <script src="./assets/script.js" defer></script>
   <link rel="stylesheet" href="./assets/style.css">
 </head>

<nav class="navbar navbar-expand-lg fixed-top">
   <a class="navbar-brand" href="index">
      <img src="./assets/logo1.png" class="hov" width="170" height="50" alt="" class="">
    </a>
     <ul class="navbar-nav">
       <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
       <li class="nav-item"><a class="nav-link"  href="maps">Vendors</a></li>
       <li class="nav-item"><a class="nav-link"  href="forms.php">Sign Up Your StreetSpot</a></li>

       <?php
         if($log){
           echo "<li class='nav-item'><a class='nav-link' href='./login/logout'>Logout ($fname"." "."$lname)</a></li>";
         }
         else{
           echo "<li class='nav-item'><a class='nav-link' href='./login/login'>Login/Register</a></li>";
         }
        ?>
     </ul>
 </nav>
