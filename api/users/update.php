<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../utils/Connection.php";

$body = json_decode(file_get_contents("php://input"), true);

$db = new Connection("eco_beko");
$db->connect();

$phone_number = $body["phone"];
$first_name = $body["name"];
$last_name = $body["surname"];
$id = $body["id"];

$result = $db->execute(
  "UPDATE `users`
  SET 
  `phone_number`='$phone_number',
  `first_name`='$first_name', 
  `last_name`='$last_name'
  WHERE `id`=$id");

$db->close();
?>
