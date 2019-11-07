<?php 
include '../app/config/config.php';
$id =  $_POST['id'];
$query = "DELETE FROM `dep_sale` WHERE id=$id";
myqsli_query($link, $query);
echo 1;
?>