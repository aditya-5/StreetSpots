<?php
define("DB_SERVER",'localhost');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');
define("DB_NAME", 'streetspots');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_NAME);

$sql = "SELECT * from VENDORS";

$result = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)){
  $data[] = $row;
}

echo json_encode($data);



 ?>
