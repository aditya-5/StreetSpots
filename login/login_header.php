<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}


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
   <link rel="icon" href="../assets/img/favicon.png">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/c4b713ed09.js" crossorigin="anonymous"></script>
   <script src="../assets/js/script.js"></script>
   <link rel="stylesheet" href="../assets/css/style.css"/>
 </head>

 <nav class="navbar navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="../home">
       <img src="../assets/img/logo1.png" class="hov" width="170" height="50" alt="" class="">
     </a>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="../home">Home</a></li>

      </ul>
  </nav>
