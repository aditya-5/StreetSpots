<?php

include("./login/server.php");

$name = $desc = $addr =  '';
$error = '';

if(isset($_POST['add_vendor'])){
	$name = trim($_POST['name']);
	$desc = trim($_POST['desc']);
	$addr = trim($_POST['addr']);
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$vol = $_POST['vol'];

	if(empty($_POST['name'])||empty($_POST['desc'])||empty($_POST['addr'])||empty($_POST['lat'])||empty($_POST['lng'])||empty($_POST['vol'])){
		$error = "Some of the information is missing";
	}




	if(empty($error)){
		$name = trim($_POST['name']);
		$desc = trim($_POST['desc']);
		$addr = trim($_POST['addr']);
		$lat = $_POST['lat']+0;
		$lng = $_POST['lng']+0;
		$vol = $_POST['vol']+0;
		echo $name.$desc.$addr.$lat.$lng.$vol;
		echo gettype($lat).gettype($lng).gettype($vol).gettype($name).gettype($desc).gettype($addr);
		$sql = "INSERT INTO VENDORS (name,description,address,lat, lng,vol) VALUES(?, ?, 	?, ?, ?, ?)";
    // $sql = "INSERT INTO VENDORS (name,description,address,lat, lng,vol) VALUES('sadas', 'asfasfsa', 'asfasf', 131131, 231233, 1)";
		if($stmt = mysqli_prepare($conn, $sql)){
      mysqli_stmt_bind_param($stmt, "sssddi", $name, $desc, $addr, $lat, $lat, $vol);
			if(mysqli_stmt_execute($stmt)){
				header("location: index.php");
			}
			else{
				echo "Couldn't execute";
			}
		}
		else{
			echo "Couldn't prepare";
		}
	}

}

 ?>
