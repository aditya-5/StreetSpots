<?php
session_start();


$_SESSION = array();

session_destroy();

header("location: ../home");
exit(0);
 ?>}
