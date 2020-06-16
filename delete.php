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
$myidbyDelete = $arr['id'];
$sql_query = "DELETE FROM user_info WHERE id=$myidbyDelete";
$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
$result = $conn->query($sql_query);

$data = array(["status"=>"200 OK","result"=>"$result"]); 

        
header('Content-Type: application/json');

echo json_encode(array("data"=> $data));

?>