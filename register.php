<?php

$db_name = "webappdb";
$mysql_user = "root";
$mysql_pass = "";
$server_name = "localhost";
$type_content = $_SERVER['CONTENT_TYPE'];

   
if($type_content != 'application/json'){
    header($_SERVER['SERVER_PROTOCOL'].' 555 internal server error');
    exit();
}
$content = trim(file_get_contents("php://input"));

$arr = json_decode($content, true);

$sql_query = "INSERT INTO user_info(user_name, user_pass) VALUES ('".$arr['user_name']."', '".$arr['user_pass']."')";
$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
$result = $conn->query($sql_query);

$data = array("status"=>"220 OK");

header('Content-Type: application/json');

echo json_encode(array("data"=> $data));

?>