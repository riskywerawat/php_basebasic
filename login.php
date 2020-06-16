<?php

$db_name = "webappdb";
$mysql_user = "root";
$mysql_pass = "";
$server_name = "localhost";

$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
// $user_name = $_POST["login_name"];
// $user_pass = $_POST["login_pass"];
$content = trim(file_get_contents("php://input"));
$arr = json_decode($content, true);

$sql_query = "SELECT * from user_info WHERE user_name like '".$arr['user_name']."' and user_pass like '".$arr['user_pass']."';";

$result = mysqli_query($conn,$sql_query);
if(mysqli_num_rows($result) > 0 ) {

$row = mysqli_fetch_assoc($result);
res();
echo json_encode(array("status"=>"200","message"=>"OK"));
} else {
res();
echo json_encode(array("status"=>"400","message"=>"Login Failed...Try Again."));

}
function res(){
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    

}

?>