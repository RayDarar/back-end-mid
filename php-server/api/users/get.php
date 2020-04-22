<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../utils/Connection.php";

$db = new Connection("eco_beko");
$db->connect();

$result = $db->select("SELECT * FROM `users`");

echo json_encode($result);

$db->close();
?>
