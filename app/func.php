<?php 
//Connections
require_once 'config/config.php'; 
//-------------------------------//
$id = 0;
//Expenses
if(!isset($_POST['submitEx'])) {
     echo "Expense Not Added";
} else {
    $item = $_POST['e_item'];
    $price = $_POST['e_price'];
    $descr = $_POST['e_descr'];

    //Inserting Data
	$query = "INSERT INTO `dep_expenses`(e_item,e_price,e_descr,e_date) 
	          VALUES ('$item', '$price','$descr', CURDATE())";
	$result = mysqli_query($link, $query);
	header('location: ../public/welcome.php');
}
//Suppliers
if(isset($_POST['submitSup'])) {
    
    $mobile = $_POST['s_mob'];
    $name = $_POST['s_name'];
    $company = $_POST['s_company'];
    $address = $_POST['address'];

    //Inserting Data
	$query = "INSERT INTO `dep_supplier`(s_mob,s_name,s_company,address) 
	          VALUES ('$mobile', '$name','$company', '$address')";
	$result = mysqli_query($link, $query);
	header('location: ../public/welcome.php');
} else {
    echo "Supplier Not Added";
}
//Stock
if(isset($_POST['submitStock'])) {
    
    $type = $_POST['p_type'];
    $name = $_POST['p_name'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['p_cost'];
    $qty = $_POST['p_qty'];
    $descr = $_POST['descr'];
    $category = $_POST['category'];

    //Inserting Data
	$query = "INSERT INTO `dep_stock`(date,p_type,p_name,supplier,p_cost,p_qty,descr,category) 
	          VALUES (CURDATE(),'$type', '$name','$supplier', '$cost', '$qty', '$descr','$category')";
	$result = mysqli_query($link, $query);
	header('location: ../public/welcome.php');
} else {
    echo "Item Not Added";
}
//Sale

if (isset($_POST['submit'])) {
	$name = $_POST['c_name'];
	$mobile = $_POST['c_mob'];
	$dDate = $_POST['d_date'];
	$frame = $_POST['frame'];
	$size = $_POST['size'];
	$lense = $_POST['lense'];
	$descr = $_POST['descr'];
	$paid = $_POST['paid'];
	$remains = $_POST['remains'];
	$refer = $_POST['c_refer'];
	$type = $_POST['type'];
	$b = implode(",", $type);

	$dr_sph = $_POST['dr_sph'];
	$dr_cyl = $_POST['dr_cyl'];
	$dr_axis = $_POST['dr_axis'];
	$dr_va   = $_POST['dr_va'];
	$dl_sph = $_POST['dl_sph'];
	$dl_cyl = $_POST['dl_cyl'];
	$dl_axis = $_POST['dl_axis'];
	$dl_va   = $_POST['dl_va'];

	$nr_sph = $_POST['nr_sph'];
	$nr_cyl = $_POST['nr_cyl'];
	$nr_axis = $_POST['nr_axis'];
	$nr_va   = $_POST['nr_va'];
	$nl_sph = $_POST['nl_sph'];
	$nl_cyl = $_POST['nl_cyl'];
	$nl_axis = $_POST['nl_axis'];
	$nl_va   = $_POST['nl_va'];

	//Inserting Data
	$query = "INSERT INTO `dep_sale`(date,c_name, c_mob, d_date, frame, size, lense, descr,c_refer, paid, remains,type,
	dr_sph,dr_cyl,dr_axis,dr_va,dl_sph,dl_cyl,dl_axis,dl_va,nr_sph,nr_cyl,nr_axis,nr_va,nl_sph,nl_cyl,nl_axis,nl_va) 
	          VALUES (CURDATE(),'$name', '$mobile', '$dDate', '$frame', '$size', '$lense', '$descr','$refer', '$paid', '$remains','$b',
	          '$dr_sph','$dr_cyl','$dr_axis','$dr_va','$dl_sph','$dl_cyl','$dl_axis','$dl_va',
	          '$nr_sph','$nr_cyl','$nr_axis','$nr_va','$nl_sph','$nl_cyl','$nl_axis','$nl_va')";
	$result = mysqli_query($link, $query); 
    //Fetching Data From DB (Sale)
    $query = "SELECT * FROM `dep_sale` ORDER BY id DESC";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $getId = $row['id'];
	header("location: ../public/print_invoice.php?id=$getId");           
} else {
	echo "Order Not Completed";
}

    if (isset($_GET['del'])) {
       $id = $_GET['del'];
       mysqli_query($link, "DELETE FROM `dep_sale` WHERE id=$id");
       Header('Location: ../public/welcome.php');
     }

?>
