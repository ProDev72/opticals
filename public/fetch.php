<?php  
 //fetch.php  
include '../app/config/config.php';
 if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM `dep_sale` WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>