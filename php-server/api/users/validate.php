<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../utils/Connection.php";

$body = json_decode(file_get_contents("php://input"), true);

$phone_number = $body["phone"];
$password = md5($body["password"]);

$db = new Connection("eco_beko");

$db->connect();

$result = $db->select(
  "SELECT * FROM users 
   WHERE phone_number='$phone_number'");

if ($result["rows"]) {
  $user = $result["data"][0];
  if ($user["password"] == $password) {
    $result = array("id" => $user["id"], "name" => $user["first_name"], "surname" => $user["last_name"], "phone" => $user["phone_number"], "birthday" => $user["birthday"], "gender" => $user["gender"] ? "male" : "female");
    echo json_encode($result);
  } else echo json_encode(array("err" => "password is incorrect"));
} else echo json_encode(array("err" => "user do not exists"));

$db->close();
?>
