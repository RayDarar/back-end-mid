<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../../helpers/Connection.php";

$body = json_decode(file_get_contents("php://input"), true);

$phone_number = $body["phone"];
$password = md5($body["password"]);

$db = new Connection("eco_beko");

$db->connect();

$result = $db->select(
  "SELECT * FROM users 
   WHERE phone_number='$phone_number'");

if ($result) {
  $user = $result["data"][0];
  if ($user["password"] == $password) {
    echo json_encode($user);
  } else echo json_encode(array("err" => "password is incorrect"));
} else echo json_encode(array("err" => "user do not exists"));

$db->close();
?>
