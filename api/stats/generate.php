<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../utils/Connection.php";

$db = new Connection("eco_beko");
$db->connect();

$result = $db->select("SELECT * FROM `users`");

$matrix = array();

for ($i = 0, $j = 0; $i < $result["rows"]; $i++, $j = 0) { 
  $matrix[$i] = array();
  $user = $result["data"][$i];
  $chars = str_split($user["phone_number"]);

  foreach ($chars as $char) {
    $matrix[$i][$j] = ((int)$user["id"]) * $char;
    $j++;
  }
}

echo json_encode(array("matrix" => $matrix));

$db->close();
?>
