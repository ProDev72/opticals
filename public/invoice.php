<?php 
//Connections
require_once '../app/config/config.php';
//Header
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../app/login/login.php");
  exit;
}
include('header.php');

?>


<table id="data-table" class="table">
  <thead>
  <tr>
    <th>Name</th>
    <th>Mobile</th>
    <th>Delivery</th>
    <th>Frame</th>
    <th>Size</th>
    <th>Lense</th>
    <th>Advance</th>
    <th>Total</th>
    <th>Print</th>
  </tr>
  </thead>
  <tbody>
  <?php  
  //Fetching Data From DB (Sale)
  $query = "SELECT * FROM `dep_sale` ORDER BY id DESC";
  $result = mysqli_query($link, $query);
   while ($row = mysqli_fetch_array($result)) { ?>
    
    <tr>
      <td><?php echo $row['c_name']; ?></td>
      <td><?php echo $row['c_mob']; ?></td>
      <td><?php echo $row['d_date']; ?></td>
      <td><?php echo $row['frame']; ?></td>
      <td><?php echo $row['size']; ?></td>
      <td><?php echo $row['lense']; ?></td>
      <td><?php echo $row['paid']; ?></td>
      <td><?php echo $row['remains']; ?></td>
      <td><a href="print_invoice.php?id=<?php echo $row['id']; ?>">Print</a></td>
    </tr>

  <?php } ?> 
  </tbody>
</table>


<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#data-table').DataTable();
	});
</script>



<?php include('footer.php');?>