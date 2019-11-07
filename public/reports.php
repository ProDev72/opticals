<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../app/login/login.php");
  exit;
}

include '../app/config/config.php';
include('header.php');


    if (isset($_GET['del'])) {
       $id = $_GET['del'];
       mysqli_query($link, "DELETE FROM `dep_sale` WHERE id=$id");
       Header('Location: ../public/reports.php');
     }

     if (isset($_GET['sdel'])) {
       $id = $_GET['sdel'];
       mysqli_query($link, "DELETE FROM `dep_stock` WHERE id=$id");
       Header('Location: ../public/reports.php');
     }
     if (isset($_GET['edel'])) {
       $id = $_GET['edel'];
       mysqli_query($link, "DELETE FROM `dep_expenses` WHERE id=$id");
       Header('Location: ../public/reports.php');
     }
    
?>
<script type="text/javascript">
  function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('data-table'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,".xlsx");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

function printData()
{
   var divToPrint=document.getElementById("data-table");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

//Date Table 3
 function fnExcelReport3()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('data-table3'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea3.document.open("txt/html","replace");
        txtArea3.document.write(tab_text);
        txtArea3.document.close();
        txtArea3.focus(); 
        sa=txtArea3.document.execCommand("SaveAs",true,".xlsx");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

function printData3()
{
   var divToPrint=document.getElementById("data-table3");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
//Date Table 4
 function fnExcelReport4()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('data-table4'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea4.document.open("txt/html","replace");
        txtArea4.document.write(tab_text);
        txtArea4.document.close();
        txtArea4.focus(); 
        sa=txtArea4.document.execCommand("SaveAs",true,".xlsx");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

function printData4()
{
   var divToPrint=document.getElementById("data-table4");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
<div class="container">
  <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li class="active"><a href="#sale" role="tab" data-toggle="tab">Sale Reports</a></li>
  <li><a href="#stock" role="tab" data-toggle="tab">Stock Reports</a></li>
 <!-- <li><a href="#expense" role="tab" data-toggle="tab">Expense Reports</a></li>-->
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="sale">
    <br><br>
    <h3 class="report-heading">Sale Report</h3>
    <a href="welcome.php" title="Home" class="btn btn-success "><span class="glyphicon glyphicon-home"></span></a>
    <div class="btn-group pull-right">
    <a onclick="fnExcelReport();" class="btn btn-info" title="Export"><span class="glyphicon glyphicon-download"></span> Export</a>
    <a id="print-btn" onclick="printData()" title="Print" class="btn btn-primary no-print"><span class="glyphicon glyphicon-print"></span> Print</a>
    </div>
    <br><br><br><br>
    <iframe id="txtArea1" style="display:none"></iframe>
   <table class="table print display" border="1" id="data-table">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Name</th>
				<th>Dist. R-SPH</th>
                <th>Dist. R-CYL</th>
				<th>Dist. L-SPH</th>
                <th>Dist. L-CYL</th>
				<th>Near R-SPH</th>
               <!-- <th>Mobile</th>-->
              <!--  <th>Delivery</th>-->
                <th>Product</th>
                <!--<th>Reference</th>-->               
                <th>Advance</th>
                <th>Remainings</th>
                <th class="text-center no-print">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php

              //Fetching Data From DB (Sale)
              $query = "SELECT * FROM `dep_sale` ORDER BY id DESC";
              $result = mysqli_query($link, $query);
               while ($row = mysqli_fetch_array($result)) { ?>
                
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['c_name']; ?></td>
				   <td><?php echo $row['dr_sph']; ?></td>
                   <td><?php echo $row['dr_cyl']; ?></td>
				    <td><?php echo $row['dl_sph']; ?></td>
                   <td><?php echo $row['dl_cyl']; ?></td>
				   <td><?php echo $row['nr_sph']; ?></td>
                 <!-- <td><?php echo $row['c_mob']; ?></td>-->
                  <!--<td><?php echo $row['d_date']; ?></td>-->
                  <td><?php echo $row['frame']; echo ",",$row['size']; echo ",",$row['lense']; ?></td>
                <!--  <td><?php echo $row['c_refer']; ?></td>-->
                  <td><?php echo $row['paid']; ?></td>
                  <td><?php echo $row['remains']; ?></td>
                  <td class="text-center">
                     <a href="print_invoice.php?id=<?php echo $row['id']; ?>" title="Print"><span class="glyphicon glyphicon-print"></span></a>&nbsp;&nbsp;&nbsp;
                     <a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" title="Sale"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="reports.php?del=<?php echo $row['id'] ?>" title="Delete" style="color: red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php } ?> 
              </tbody>
            </table>


  </div>
              <?php
              //Connections
              //Fetching Data From DB (Sale)
              $selquery = "SELECT * FROM `dep_sale`";
              $selresult = mysqli_query($link, $selquery);
               while ($row = mysqli_fetch_array($selresult)) { ?>
  <!-- Editing Modal -->
        <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Details</h4>
              </div>
              <div class="modal-body">
                <form method="POST" action="update.php">
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="text" class="form-control" value="<?php echo $row['c_name']; ?>" required id="c_name" name="c_name" placeholder="Name..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="phone" class="form-control" value="<?php echo $row['c_mob']; ?>" required id="c_mob" name="c_mob" placeholder="Mobile..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['d_date']; ?>" required id="d_date" name="d_date"  onfocus="(this.type='date')" placeholder="Delivery Date..."/>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['frame']; ?>" required id="frame" name="frame" placeholder="Frame..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['size']; ?>" required id="size" name="size" placeholder="Size..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['lense']; ?>" required id="lense" name="lense" placeholder="Lense..."/>
                  </div>
                </div>
                <br>
               
                <div class="well">
                  <label>Distance</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_sph" value="<?php echo $row['dr_sph']; ?>" name="dr_sph" placeholder="Right SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_cyl" value="<?php echo $row['dr_cyl']; ?>" name="dr_cyl" placeholder="Right CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_axis" value="<?php echo $row['dr_axis']; ?>" name="dr_axis" placeholder="Right AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_va" value="<?php echo $row['dr_va']; ?>" name="dr_va" placeholder="Right VA..."/>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_sph" value="<?php echo $row['dl_sph']; ?>" name="dl_sph" placeholder="Left SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_cyl" value="<?php echo $row['dl_cyl']; ?>" name="dl_cyl" placeholder="Left CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_axis" value="<?php echo $row['dl_axis']; ?>" name="dl_axis" placeholder="Left AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_va" value="<?php echo $row['dl_va']; ?>" name="dl_va" placeholder="Left VA..."/>
                  </div> 
                </div>
                <br>
                <label>Near</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_sph" value="<?php echo $row['nr_sph']; ?>" name="nr_sph" placeholder="Right SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_cyl" value="<?php echo $row['nr_cyl']; ?>" name="nr_cyl" placeholder="Right CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_axis" value="<?php echo $row['nr_axis']; ?>" name="nr_axis" placeholder="Right AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_va" value="<?php echo $row['nr_va']; ?>" name="nr_va" placeholder="Right VA..."/>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_sph" value="<?php echo $row['nl_sph']; ?>" name="nl_sph" placeholder="Left SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_cyl" value="<?php echo $row['nl_cyl']; ?>" name="nl_cyl" placeholder="Left CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_axis" value="<?php echo $row['nl_axis']; ?>" name="nl_axis" placeholder="Left AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_va" value="<?php echo $row['nl_va']; ?>" name="nl_va" placeholder="Left VA..."/>
                  </div> 
                </div>
              </div>
                <div class="row">
                   <div class="col-lg-4 col-md-4">
                    <table border="1" class="table">
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="Cr."/> Cr.</td>
                        <td> <input type="checkbox" name="type[]" value="Photo Brown"/> Photo Brown</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="High Nidex"/> High Nidex</td>
                        <td> <input type="checkbox" name="type[]" value="Toric"/> Toric</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="Criptoric"/> Criptoric</td>
                        <td> <input type="checkbox" name="type[]" value="D Type"/> D Type</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="White"/> White</td>
                        <td> <input type="checkbox" name="type[]" value="Antiglare"/> Anitglare</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="Progressive"/> Progressive</td>
                        <td> <input type="checkbox" name="type[]" value=" CR H.C"/> CR H.C</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type" value="Poly Carbonate"/> Poly Carbonate</td>
                        <td></td>
                      </tr>
                    </table>
                   </div>
                 <div class="col-lg-8 col-md-8">
                    <textarea rows="11" class="form-control" id="descr" name="descr" placeholder="Description...">
                      <?php echo $row['descr']; ?>
                    </textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['c_refer']; ?>" required id="c_refer" name="c_refer" placeholder="Reference Dr..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['paid']; ?>" required id="paid" name="paid" placeholder="Paid..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" value="<?php echo $row['remains']; ?>" required id="remains" name="remains" placeholder="Remaining..."/>
                  </div>
                </div>
                <br> 
                <button type="submit" id="update" name="update" class="btn btn-info pull-right">Update</button>
				
              </form>
              <br><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				 <td><a href="print_invoice.php?id=<?php echo $row['id']; ?>">Print</a></td>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>


  <div class="tab-pane print" id="stock">
    <br><br>
    <h3 class="report-heading">Stock Report</h3>
    <a href="welcome.php" title="Home" class="btn btn-success "><span class="glyphicon glyphicon-home"></span></a>
    <div class="btn-group pull-right">
    <a onclick="fnExcelReport3();" class="btn btn-info" title="Export"><span class="glyphicon glyphicon-download"></span> Export</a>
    <a id="print-btn" onclick="printData3()" title="Print" class="btn btn-primary no-print"><span class="glyphicon glyphicon-print"></span> Print</a>
    </div>
    <br><br><br><br>
    <iframe id="txtArea3" style="display:none"></iframe>
    <table class="table" border="1" id="data-table3">
              <thead>
              <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Supplier</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Total Cost</th>
                <th class="text-center no-print">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php  
              //Fetching Data From DB (Sale)
              $queryStock = "SELECT * FROM `dep_stock` ORDER BY id DESC";
              $result1 = mysqli_query($link, $queryStock);
               while ($row = mysqli_fetch_array($result1)) { ?>
                
                <tr>
                  <td><?php echo $row['p_name']; ?></td>
                  <td><?php echo $row['p_type']; ?></td>
                  <td><?php echo $row['supplier']; ?></td>
                  <td><?php echo $row['p_cost']; ?></td>
                  <td><?php echo $row['p_qty']; ?></td>
                  <td><?php echo $row['p_cost'] * $row['p_qty']; ?></td>
                  <td class="no-print text-center">
                    &nbsp;&nbsp;&nbsp;
                     <a data-toggle="modal" href="#stocks<?php echo $row['id']; ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                     &nbsp;&nbsp;&nbsp;
                    <a href="reports.php?sdel=<?php echo $row['id'] ?>" title="Delete" style="color: red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php } ?> 
              </tbody>
            </table>
  </div>
          <!-- Stock Editing -->
        <?php
    //Connections
    //Fetching Data From DB (Sale)
    $stockquery = "SELECT * FROM `dep_stock`";
    $stockresult = mysqli_query($link, $stockquery);
     while ($row = mysqli_fetch_array($stockresult)) { ?>
     
     <div class="modal fade" id="stocks<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Stock</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="update.php">
            <div class="row">
              <div class="col-lg-6">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">      
                <input type="text" class="form-control" required value="<?php echo $row['p_name']; ?>" name="p_name" placeholder="Product Name..." />
              </div>
              <div class="col-lg-6">
                <select class="form-control" required value="<?php echo $row['p_type']; selected?>" name="p_type">
                  <option value="<?php echo $row['p_type']?>" disabled selected><?php echo $row['p_type']?></option> 
                  <option value="Frame">Frame</option> 
                  <option value="Lense">Lense</option> 
                </select>
              </div>
               
             </div>
             <br>
             <div class="row">
                <div class="col-lg-12">
                  <textarea class="form-control" rows="6" name="descr" placeholder="Description...">
                    <?php echo $row['descr']; ?>
                  </textarea>
                </div>      
             </div>
             <br>
             <div class="row">
               <div class="col-lg-4">
                <input type="text" class="form-control"  value="<?php echo $row['category']; ?>" name="category" placeholder="Category..." />
              </div>
               <div class="col-lg-4">
                <input type="number" class="form-control"  value="<?php echo $row['p_cost']; ?>" required name="p_cost" placeholder="Cost per item..." />
              </div>
              <div class="col-lg-4">
                <input type="number" class="form-control"  value="<?php echo $row['p_qty']; ?>" required name="p_qty" placeholder="Quantity..." />
              </div>
             </div>
            <br>
             <?php 
                //Fetching Into Field
                $grab = "SELECT s_name FROM `dep_supplier`";
                $fetchQuery = mysqli_query($link, $grab);

               ?>
               <div class="row">
              <div class="col-lg-12">
                <select class="form-control" required name="supplier" value="<?php echo $row['supplier']; selected?>" placeholder="Supplier...">
                <option disabled selected value="<?php echo $row['supplier']; ?>"><?php echo $row['supplier']; ?></option>
                <?php while ($row = mysqli_fetch_array($fetchQuery)) { ?>
                  <option value="<?php echo $row['s_name']; ?>"><?php echo $row['s_name']; ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
              <br>
              <button type="submit" name="updateStock" class="btn btn-success pull-right">Update</button>
              <br><br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

               <?php } ?>



  <div class="tab-pane print" id="expense">
          <br><br>
          <h3 class="report-heading">Expense Report</h3>
          <a href="welcome.php" title="Home" class="btn btn-success "><span class="glyphicon glyphicon-home"></span></a>
          <div class="btn-group pull-right">
          <a onclick="fnExcelReport4();" class="btn btn-info" title="Export"><span class="glyphicon glyphicon-download"></span> Export</a>
          <a id="print-btn" onclick="printData4()" title="Print" class="btn btn-primary no-print"><span class="glyphicon glyphicon-print"></span> Print</a>
          </div>
          <br><br><br><br>
          <iframe id="txtArea4" style="display:none"></iframe>
            <table class="table" border="1" id="data-table4">
              <thead>
              <tr>
                <th>Date</th>
                <th>Item</th>
                <th>Price</th>
                <th>Description</th>
                <th class="text-center no-print">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php  
              //Fetching Data From DB (Sale)
              $queryex = "SELECT * FROM `dep_expenses` ORDER BY e_date DESC";
              $result2 = mysqli_query($link, $queryex);
               while ($row = mysqli_fetch_array($result2)) { ?>
                
                <tr>
                  <td><?php echo $row['e_date']; ?></td>
                  <td><?php echo $row['e_item']; ?></td>
                  <td><?php echo $row['e_price']; ?></td>
                  <td><?php echo $row['e_descr']; ?></td>
                  <td class="no-print text-center">
                    &nbsp;&nbsp;&nbsp;
                     <a data-toggle="modal" href="#expenses<?php echo $row['id']; ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="reports.php?edel=<?php echo $row['id'] ?>" title="Delete" style="color: red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                
              <?php } ?> 
              </tbody>
            </table>

            <?php
    //Connections
    //Fetching Data From DB (Sale)
    $expensequery = "SELECT * FROM `dep_expenses`";
    $expenseresult = mysqli_query($link, $expensequery);
     while ($row = mysqli_fetch_array($expenseresult)) { ?>
      
  <div class="modal fade" id="expenses<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Expenses</h4>
      </div>
      <div class="modal-body">
            <br><br>
            <form method="POST" action="update.php">
            <div class="row">
              <div class="col-lg-6">      
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" class="form-control" required value="<?php echo $row['e_item']; ?>" name="e_item" placeholder="Item Name..." />
              </div>
              <div class="col-lg-6">
                <input type="number" class="form-control" required value="<?php echo $row['e_price']; ?>" name="e_price" placeholder="Price..." />
              </div>
             </div>
             <br>
             <div class="row">
                <div class="col-lg-12">
                  <textarea class="form-control" rows="6" name="e_descr" placeholder="Description..."><?php echo $row['e_descr']; ?></textarea>
                </div>
             </div>
              <br>
              <button type="submit" name="updateExpense" class="btn btn-success pull-right">Update</button>
              <br><br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

     <?php } ?>
  </div>
</div>
  
</div>
       
<!--*********************-->
<script type="text/javascript">
  $(document).ready(function(){
    var table = $('#data-table').DataTable();
  });

  $('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
</script>

<?php include "footer.php";?>