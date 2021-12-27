<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">

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
	echo("Connected Successfully<br>");
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


// To close the connection
// mysqli_close($conn);

?>
