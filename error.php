<?php header( "refresh:6;url=home" );
include("header.php");
 ?>
 <body id="errorPage">
  <center><h2 class="errorHeading">REDIRECTING IN <span id="timer">5</span></h2></center>
   <div class="container d-flex justify-content-center mt-0">
     <img src="./assets/error.png" class="errorImg" alt="">
   </div>
   <?php include("footer.php")?>

   <script>
   $(document).ready(function() {
  var i =5

  var x = setInterval(function(){
     as();
     i--;
     if(i<0){
       clearInterval(x);
     }
   },1000)


  function as(){
    $("#timer").text(i);
  }



   })
   </script>
 </body>
