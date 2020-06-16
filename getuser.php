<?php
$db_name = "webappdb";
$mysql_user = "root";
$mysql_pass = "";
$server_name = "localhost";

$content = trim(file_get_contents("php://input"));

$sql = "SELECT * FROM user_info";
$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    $arr = array();
    while($row = $result->fetch_assoc()) {
        array_push($arr,"id:".$row['id']."  ".$row['user_name']);
    }header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *");
    echo json_encode(array("status"=>"200","data"=>$arr));
} else {
    echo "0 results";
}



?>