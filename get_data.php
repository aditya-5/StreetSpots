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

foreach($data as $key=>$value){

  $sql = "SELECT * from IMAGES where vendor_id = ".$value['vendor_id'];
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)){
    $data[$key]['image'] = $row['image'];
    // $data[$key]['image_name'] = $row['image_name'];
    // $data[$key]['image_id'] = $row['image_id'];

  }
}


echo json_encode($data);
// echo $data;




 ?>
