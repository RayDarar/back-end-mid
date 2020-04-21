<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../utils/Connection.php";

$db = new Connection("eco_beko");
$db->connect();

$result = $db->execute("SELECT * FROM `users`");

$count = 0;

while($row = mysqli_fetch_row($result)) {
  $count += 1;
}

echo json_encode(array("count" => $count));

$db->close();
?>
