<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../../helpers/Connection.php";

$body = json_decode(file_get_contents("php://input"), true);

$db = new Connection("eco_beko");
$db->connect();

$phone_number = $body["phone"];
$first_name = $body["name"];
$last_name = $body["surname"];
$gender = $body["gender"];
$password = md5($body["password"]);
$birthday = $body["birthday"];

$result = $db->select(
  "SELECT * FROM users 
   WHERE phone_number='$phone_number'");

if ($result["rows"]) echo json_encode(array("err" => "user exists"));
else {
  $db->insert(
    "INSERT INTO 
    users(phone_number, first_name, last_name, gender, password, birthday) 
    VALUES ('$phone_number', '$first_name', '$last_name', $gender, '$password', STR_TO_DATE('$birthday', '%d-%m-%Y'))");

  echo json_encode(array("status" => "success"));
}

$db->close();
?>
