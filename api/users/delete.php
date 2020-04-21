<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../utils/Connection.php";

$body = json_decode(file_get_contents("php://input"), true);

$db = new Connection("eco_beko");
$db->connect();

$id = $body["id"];

$result = $db->update(
  "DELETE FROM `users`
  WHERE `id`=$id");

$db->close();
?>
