<?php
$conn = mysqli_connect('localhost', 'root', '', 'iot_database');

$result = mysqli_query($conn, 'SELECT * FROM `doorstatus` ');

$data = array();

while($row = mysqli_fetch_assoc($result)){
  $data[] = $row;
}

echo json_encode($data);

?>