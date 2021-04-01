<?php
// For local database only
define("DB_SERVER",'localhost');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');
define("DB_NAME", 'streetspots');

// First run (Local)
// $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

// If database already created (Local)
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_NAME);

// $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

if($conn === false){
	die("ERROR: COULDN'T CONNECT TO DATABASE " .  mysqli_connect_error());
}
else{
	$msgg = "Connected Successfully";
}

// First run only - Creating database

// $sql = "CREATE DATABASE ".DB_NAME;
// if(mysqli_query($conn, $sql)){
// 	echo "Created Database successfully";
// }
// else{
// 	echo("Error creating database : ". mysqli_error($conn));
// 	exit();
// }


// First run only - Creating table
// 		$sql = "
// 		CREATE TABLE USERS (
// 		  user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 		  username varchar(255)  NOT NULL UNIQUE,
// 		  password varchar(255)  NOT NULL,
// 		  email varchar(255)  NOT NULL,
// 		  first_name varchar(255)  NOT NULL,
// 		  last_name varchar(255)  NOT NULL
// 		)";
//
// if(mysqli_query($conn, $sql)){
// 	echo("Created Table successfully");
// }
// else{
// 	echo("Error creating table : ". mysqli_error($conn));
// }

// ******************************************

// First run only - Creating table for storing lats and longs
// 		$sql = "
// 		CREATE TABLE VENDORS (
// 		  vendor_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 		  name varchar(255)  NOT NULL,
// 		  description varchar(255)  NOT NULL,
// 		  address varchar(255)  NOT NULL,
// 		  lat FLOAT(50)	NOT NULL,
// 		  lng FLOAT(50)	NOT NULL,
// 			vol INT NOT NULL
// 		)";
//
// if(mysqli_query($conn, $sql)){
// 	echo("Created Table successfully");
// }
// else{
// 	echo("Error creating table : ". mysqli_error($conn));
// }



// To close the connection
// mysqli_close($conn);

?>
