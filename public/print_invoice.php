<?php
	// Initialize the session
	session_start();
	 
	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	  header("location: ../app/login/login.php");
	  exit;
	}
    //Print Invoice
	//Connections
    include '../app/config/config.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM `dep_sale` WHERE id=$id LIMIT 1";
    $execute = mysqli_query($link, $query);
    $row = mysqli_fetch_array($execute);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amir Opticals</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../dist/js/dataTables.bootstrap.min.js"></script>
    <link type="text/javascript" href="../dist/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
  <div class="wrapper center-block">
   <div class="content center-block">
   	<div class="slip-logo">
   		<p class="left-logo">Amir Optical</p>
   		<div class="pull-right second-logo">
		<div class="contact pull-right text-right">
		
      <h3><b>Proprietor:-</br> Malik Amjad Awan</b></h3>
      <h4><b>0334-3546604</b></h4>
    </div>
   		<!--<p class="right-logo">عامر آپٹیکل سروس</p>-->
   		
   	    </div>
   	</div>
    
	<p class="urdu-tagline">کرامت مارکیٹ بالمقابل ڈسٹرکٹ ہیڈر کوارٹر ہسپتال ریلوے روڈ شیخوپورہ </p>
	</br>
    <table class="invoice-slip table-responsive pull-left">
     <tr>
     	<td><b>Sr.no: </b><p class="fetched-data"><?php echo $row['id']; ?></p></td>
     	<td><b>Date:</b> <p class="fetched-data"><?php echo $row['date']; ?></p></td>
     <!--	<td>Delivery: <p class="fetched-data"><?php echo $row['d_date']; ?></p></td>-->
     </tr>
     <tr>
      <td><b>Name: </b><p class="fetched-data"><?php echo $row['c_name']; ?></p></td>
	  <td><b>Refer:</b> <p class="fetched-data"><?php echo $row['c_refer']; ?></p></td>
    <!--  <td>Mobile: <p class="fetched-data"><?php echo $row['c_mob']; ?></p></td> -->
     <!-- <td>Other: <p class="fetched-data">&nbsp;</p></td> --> 
    </tr>
    <!--<tr>
      <td>Frame: <p class="fetched-data"><?php //echo $row['frame']; ?></p></td>
      <td>Size: <p class="fetched-data"><?php //echo $row['size']; ?></p></td>
      <td>Lense: <p class="fetched-data"><?php //echo $row['lense']; ?></p></td>
    </tr>-->
    <tr>
      
      <td><b>Advance: </b><p class="fetched-data"><?php echo $row['paid']; ?></p></td>
      <td><b>Remains: </b><p class="fetched-data"><?php echo $row['remains']; ?></p></td>
	  
    </tr>
   <!-- <tr>
      <td>Type: <p class="fetched-data">&nbsp;<?php echo $row['type']; ?></p></td>
      <td colspan="4">Description:<p class="fetched-data descr">&nbsp;<?php echo $row['descr']; ?></p></td>
    </tr>-->
    </table>
    <table border="3.5" >
      <thead>
        <tr>
        <td width="40" ></td>
        <td width="90"><b>SPH</b></td>
        <td width="90"><b>CYL</b></td>
        <td width="90"><b>AXIS</b></td>
        <td width="90"><b> VA</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
		
          <td class="text-center narrow"><b>R</b></td>
          <td class="text-center narrow"><?php echo $row['dr_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['dr_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['dr_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['dr_va']; ?></td>
        </tr>
        <tr>
          <td class="text-center narrow"><b>L</b></td>
          <td class="text-center narrow"><?php echo $row['dl_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['dl_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['dl_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['dl_va']; ?></td>
        </tr>
         <tr>
          <td class="text-center narrow"><b>R</b></td>
          <td class="text-center narrow"><?php echo $row['nr_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['nr_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['nr_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['nr_va']; ?></td>
        </tr>
        <tr>
          <td class="text-center narrow"><b>L</b></td>
          <td class="text-center narrow"><?php echo $row['nl_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['nl_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['nl_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['nl_va']; ?></td>
        </tr>
      </tbody>
    </table>
    <div class="note">
    <div class="text-right pull-right cond">
      <h4>ہر آرڈر کی تکمیل ہمیشہ وقت پر ہوتی ہے لیکن کبھی بجلی فیل ہونے شیشہ نہ ملنے یا کسی مجبوری سے کمی پیشی ممکن ہے</h4>
      <h4>گاہک کا اپنا فریم یا شیشہ مرمت کے دوران جل یا ٹوٹ جانے کی صورت میں ہم ذمہ دار نہ ہوں گے</h4>
      <h4>اپنی عینک پندرہ 15 دن کے اندر لے جایں بعد میں ہم ذمدار نہ ہوں گے</h4>
      <h4>خریدا ہوا مال واپس یا تبدیل نی ہو گا</h4>
    </div>

	<td><b>Advice:</b></td>
	
    
    <table class="invoice-slip table-responsive">
    <tr>
    <td></br></br></br>Signature <p class="fetched-data">&nbsp;</p></td>
    </tr>
    </table>
	<h5 class="text-right pull-right cond"><b>Computer Software Developed By</b> <b>Com-Bit Solutions</b> <b>+923456313176</b></h5>
   </div>
  
   </div>
      <div class="content center-block con-2">
    <div class="slip-logo">
     <p class="left-logo">Amir Optical</p>
   		<div class="pull-right second-logo">
		<div class="contact pull-right text-right">
		
      <h3><b>Proprietor:-</br> Malik Amjad Awan</b></h3>
      <h4><b>0334-3546604</b></h4>
    </div>
   		<!--<p class="right-logo">عامر آپٹیکل سروس</p>-->
   		
   	    </div>
   	</div>
    
	<p class="urdu-tagline">کرامت مارکیٹ بالمقابل ڈسٹرکٹ ہیڈر کوارٹر ہسپتال ریلوے روڈ شیخوپورہ </p>
	</br>
    <table class="invoice-slip table-responsive pull-left">
     <tr>
      <td><b>Sr.no:</b> <p class="fetched-data"><?php echo $row['id']; ?></p></td>
      <td><b>Date: </b><p class="fetched-data"><?php echo $row['date']; ?></p></td>
  <!--    <td>Delivery: <p class="fetched-data"><?php echo $row['d_date']; ?></p></td>-->
     </tr>
     <tr>
      <td><b>Name: </b><p class="fetched-data"><?php echo $row['c_name']; ?></p></td>
	   <td><b>Refer: </B><p class="fetched-data"><?php echo $row['c_refer']; ?></p></td>
     <!-- <td>Mobile: <p class="fetched-data"><?php echo $row['c_mob']; ?></p></td>-->
     <!-- <td>Other: <p class="fetched-data">&nbsp;</p></td>  -->
    </tr>
    <!--<tr>
      <td>Frame: <p class="fetched-data"><?php //echo $row['frame']; ?></p></td>
      <td>Size: <p class="fetched-data"><?php //echo $row['size']; ?></p></td>
      <td>Lense: <p class="fetched-data"><?php //echo $row['lense']; ?></p></td>
    </tr>-->
    <tr>
     
      <td><b>Advance: </b><p class="fetched-data"><?php echo $row['paid']; ?></p></td>
      <td><b>Remains: </b><p class="fetched-data"><?php echo $row['remains']; ?></p></td>
    </tr>
 <!--   <tr>
      <td>Type: <p class="fetched-data">&nbsp;<?php echo $row['type']; ?></p></td>
      <td colspan="5">Description: <p class="fetched-data descr">&nbsp;<?php echo $row['descr']; ?></p></td>
    </tr>
	-->
      
    </table>
    <table border="3.5" >
       <thead>
        <tr>
        <td width="40" ></td>
        <td width="90"><b>SPH</b></td>
        <td width="90"><b>CYL</b></td>
        <td width="90"><b>AXIS</b></td>
        <td width="90"><b> VA</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
		
          <td class="text-center narrow"><b>R</b></td>
          <td class="text-center narrow"><?php echo $row['dr_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['dr_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['dr_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['dr_va']; ?></td>
        </tr>
        <tr>
          <td class="text-center narrow"><b>L</b></td>
          <td class="text-center narrow"><?php echo $row['dl_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['dl_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['dl_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['dl_va']; ?></td>
        </tr>
         <tr>
          <td class="text-center narrow"><b>R</b></td>
          <td class="text-center narrow"><?php echo $row['nr_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['nr_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['nr_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['nr_va']; ?></td>
        </tr>
        <tr>
          <td class="text-center narrow"><b>L</b></td>
          <td class="text-center narrow"><?php echo $row['nl_sph']; ?></td>
          <td class="text-center narrow"><?php echo $row['nl_cyl']; ?></td>
          <td class="text-center narrow"><?php echo $row['nl_axis']; ?></td>
          <td class="text-center narrow"><?php echo $row['nl_va']; ?></td>
        </tr>
      </tbody>
    </table>
    <div class="note">
    <div class="text-right pull-right cond">
     <h4>ہر آرڈر کی تکمیل ہمیشہ وقت پر ہوتی ہے لیکن کبھی بجلی فیل ہونے شیشہ نہ ملنے یا کسی مجبوری سے کمی پیشی ممکن ہے</h4>
      <h4>گاہک کا اپنا فریم یا شیشہ مرمت کے دوران جل یا ٹوٹ جانے کی صورت میں ہم ذمہ دار نہ ہوں گے</h4>
      <h4>اپنی عینک پندرہ 15 دن کے اندر لے جایں بعد میں ہم ذمدار نہ ہوں گے</h4>
      <h4>خریدا ہوا مال واپس یا تبدیل نی ہو گا</h4>
    </div>
	<td><b> Advice:</b></td>
	
    
    <table class="invoice-slip table-responsive">
    <tr>
	<td></br></br></br>Signature <p class="fetched-data">&nbsp;</p></td>
	
    </tr>
    </table>
	
	<h5 class="text-right pull-right cond"><b>Computer Software Developed By</b> <b>Com-Bit Solutions</b> <b>+923456313176</b></h5>
	</div>
  
  
   </div>
   </br>
    <div class="btn-group pull-right">
	<a class="btn btn-primary no-print" onclick="window.print();" target="_blank"><span class="glyphicon glyphicon-print"></span> Print</a>
    <a href="welcome.php" class="btn btn-danger no-print"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    
    </div>
   

   </div> 
<script type="text/javascript">
 
</script>