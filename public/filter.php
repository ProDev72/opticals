<?php
header('Content-Type: application/json');
$response = array();
if (isset($_GET['c_name'])){
//vul hier je database gebuikersnaam en ww in
$con=mysqli_connect("localhost", "root", "", "optical");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$qry = "SELECT * FROM `dep_sale` WHERE c_name = '".$_GET['c_name']."' ";

$result = mysqli_query($con, $qry);  //mysql_query($qry);

while ($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
    array_push($response, $row);
}

echo json_encode($response);
} 
?>