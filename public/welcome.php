<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../app/login/login.php");
  exit;
}
include('header.php');?>
<div class="row">
 <div class="col-lg-3 col-md-3"></div>
 <div class="col-lg-6  col-md-6 ">
  <br>
  <div class="alert alert-success text-center" role="alert">
     Appointment Register of <b> Super Optics</b>.
  </div>
 </div>
 <div class="col-lg-3 col-md-3"></div>
</div>
<?php include('modals.php');?>
  <!-- Dashboard Links -->
 <div class="quicklinks">
 <div class="center-block row ul">
 </br>
     <div class="col-lg-2 col-md-2 li center-block text-center"><a data-toggle="modal" data-target="#sales" title="Sales Department"><span class="glyphicon glyphicon-shopping-cart"></span></a></br></br><h5><b>Sales Department</b></h5></div>
     <div class="col-lg-2 col-md-2 li center-block text-center"><a data-toggle="modal" data-target="#supplier" title="Purchase Department"><span class="glyphicon glyphicon-user"></span></a></br></br><h5><b>Purchase Department</b></h5></div>
     <div class="col-lg-2 col-md-2 li center-block text-center"><a data-toggle="modal" data-target="#stocks" title="Stock"><span class="glyphicon glyphicon-gift"></span></a></br></br><h5><b>Stock</b></h5></div>
     <div class="col-lg-2 col-md-2 li center-block text-center"><a data-toggle="modal" data-target="#expenses" title="Daily Expense"><span class="glyphicon glyphicon-usd"></span></a></br></br><h5><b>Expenses</b></h5></div>
     <div class="col-lg-2 col-md-2 li center-block text-center"><a href="reports.php" title="All Reports"><span class="glyphicon glyphicon-list-alt"></span></a></br></br><h5><b>All Reports</b></h5></div>
     <div class="col-lg-2 col-md-2 li center-block text-center"><a data-toggle="modal" data-target="#patients" title="Patients Record"><span class="glyphicon glyphicon-book"></span></a></br></br><h5><b>Patients Record</b></h5></div>
 </div>
 </div>

<?php include('footer.php');?>