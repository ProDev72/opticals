<?php
//Connections
require_once '../app/config/config.php'; 
?>
<!-- Sales -->
<div class="modal fade" id="sales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sales</h4>
      </div>
      <div class="modal-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#sale" role="tab" data-toggle="tab">Sale</a></li>
            <li><a href="#orders" role="tab" data-toggle="tab">Orders</a></li>
          </ul>
          <!-- Tab Panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="sale">
              <br><br>
              <form method="POST" action="../app/func.php">
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <input type="hidden" name="id" />
                    <input type="text" class="form-control" required id="c_name" name="c_name" placeholder="Name..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="phone" class="form-control" required id="c_mob" name="c_mob" placeholder="Mobile..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="d_date" name="d_date"  onfocus="(this.type='date')" placeholder="Delivery Date..."/>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="frame" name="frame" placeholder="Frame..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="size" name="size" placeholder="Size..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="lense" name="lense" placeholder="Lense..."/>
                  </div>
                </div>
                <br>
               
                <div class="well">
                  <label>Distance</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_sph" name="dr_sph" placeholder="Right SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_cyl" name="dr_cyl" placeholder="Right CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_axis" name="dr_axis" placeholder="Right AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dr_va" name="dr_va" placeholder="Right VA..."/>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_sph" name="dl_sph" placeholder="Left SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_cyl" name="dl_cyl" placeholder="Left CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_axis" name="dl_axis" placeholder="Left AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="dl_va" name="dl_va" placeholder="Left VA..."/>
                  </div> 
                </div>
                <br>
                <label>Near</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_sph" name="nr_sph" placeholder="Right SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_cyl" name="nr_cyl" placeholder="Right CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_axis" name="nr_axis" placeholder="Right AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nr_va" name="nr_va" placeholder="Right VA..."/>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_sph" name="nl_sph" placeholder="Left SPH..."/>  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_cyl" name="nl_cyl" placeholder="Left CYL..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_axis" name="nl_axis" placeholder="Left AXIS..."/>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                    <input type="text" class="form-control" id="nl_va" name="nl_va" placeholder="Left VA..."/>
                  </div> 
                </div>
                </div>
                 <?php 
                  $queryforbox = "SELECT `type` FROM `dep_sale`";
                  $getresult   = mysqli_query($link, $queryforbox);
                  $row         = mysqli_fetch_array($getresult);
                ?>
                <div class="row">
                   <div class="col-lg-4 col-md-4">
                    <table border="1" class="table">
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]"
                          <?php 
                           if ($row['type'] == 'Cr.') {
                             echo "checked";                           }
                          ?>
                         value="Cr."/> Cr.</td>
                        <td> <input type="checkbox" name="type[]" value=""/> Photo Brown</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="High Nidex"/> High Nidex</td>
                        <td> <input type="checkbox" name="type[]" value="Toric"/> Toric</td>
                      </tr>
                      <tr>
                        <td width="150"> <input type="checkbox" name="type[]" value="Criptoric"/> Criptoric</td>
                        <td> <input type="checkbox" name="type[]" value=""/> D Type</td>
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
                    <textarea rows="11" class="form-control" id="descr" name="descr" placeholder="Description..."></textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="c_refer" name="c_refer" placeholder="Reference Dr..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="paid" name="paid" placeholder="Paid..."/>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control" required id="remains" name="remains" placeholder="Remaining..."/>
                  </div>
                </div>
                <br>
                <div class="btn-group pull-right">
				<button type="submit" id="submit" name="submit" class="btn btn-success">Complete</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
                
                </div>
              </form>
            </div>
            <br>
          <div class="tab-pane fade" id="orders">
            <br><br>
            <table border="1" class="table" id="data-table">
              <thead>
              <tr>
                <th>Name</th>
                <th>Delivery</th>
                <th>Product</th>
                <th>Reference</th>
                <th>Advance</th>
                <th>Total</th>
                <th class="text-center">Action</th>
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
                  <td><?php echo $row['d_date']; ?></td>
                  <td><?php echo $row['frame']; echo ",",$row['size']; echo ",",$row['lense']; ?></td>
                  <td><?php echo $row['c_refer']; ?></td>
                  <td><?php echo $row['paid']; ?></td>
                  <td><?php echo $row['remains']; ?></td>
				  
                  <td class="text-center">
                    <a href="print_invoice.php?id=<?php echo $row['id']; ?>" title="Print"><span class="glyphicon glyphicon-print"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="../app/func.php?del=<?php echo $row['id']?>" title="Delete" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php } ?> 
              </tbody>
            </table>
          </div>
          </div>
      </div>
      <br><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--*********************-->
<!-- Supplier -->
<div class="modal fade" id="supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Supplier</h4>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" role="tablist" id="myTab">
          <li class="active"><a href="#addsupplier" role="tab" data-toggle="tab">Add Supplier</a></li>
          <li><a href="#suppliers" role="tab" data-toggle="tab">Suppliers</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="addsupplier">
            <br><br>
            <form method="POST" action="../app/func.php">
            <div class="row">
              <div class="col-lg-4">
                <input type="text" name="s_name" required="" class="form-control" placeholder="Name..."/>
              </div>
              <div class="col-lg-4">
                <input type="text" name="s_company" required="" class="form-control" placeholder="Company..."/>
              </div>
              <div class="col-lg-4">
                <input type="text" name="s_mob" required="" class="form-control" placeholder="Mobile..."/>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <textarea class="form-control" rows="6" name="address" placeholder="Address..."></textarea>
              </div>
            </div>
            <br>
			
            <div class="btn-group pull-right">
			 <button type="submit" id="submit" name="submitSup" class="btn btn-success">Complete</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
           
            </div>
            <br><br>
          </form>
          </div>
          <div class="tab-pane" id="suppliers">
            <br><br>
            <table class="table" border="1" id="data-table2">
              <thead>
              <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Company</th>
                <th>Address</th>
				<th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php  
              //Fetching Data From DB (Sale)
              $query = "SELECT * FROM `dep_supplier` ORDER BY id DESC";
              $result = mysqli_query($link, $query);
               while ($row = mysqli_fetch_array($result)) { ?>
                
                <tr>
                  <td><?php echo $row['s_name']; ?></td>
                  <td><?php echo $row['s_mob']; ?></td>
                  <td><?php echo $row['s_company']; ?></td>
                  <td><?php echo $row['address']; ?></td>
               
              <td class="text-center">
                     
                     <a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" title="Sale"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="../app/func.php?del=<?php echo $row['id']?>" title="Delete" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
				   </tr>
              <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
	  
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
      </div>
    </div>
  </div>
</div>
<!--*********************-->
<!-- Stock -->
<div class="modal fade" id="stocks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Stock</h4>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" role="tablist" id="myTab">
          <li class="active"><a href="#addstock" role="tab" data-toggle="tab">Add Stock</a></li>
          <li><a href="#stock" role="tab" data-toggle="tab">Stock</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="addstock">
            <br><br>
            <form method="POST" action="../app/func.php">
            <div class="row">
              <div class="col-lg-4">      
                <input type="text" class="form-control" required name="p_name" placeholder="Product Name..." />
              </div>
              <div class="col-lg-4">
                <select class="form-control" required name="p_type">
                      <option value="Frame">Frame</option>
                      <option value="Lense">Lense</option>
                    </select>
              </div>
              <?php 
                //Fetching Into Field
                $grab = "SELECT s_name FROM `dep_supplier`";
                $fetchQuery = mysqli_query($link, $grab);

               ?>
              <div class="col-lg-4">
                <select class="form-control" required name="supplier" placeholder="Supplier...">
                <option disabled selected value="select">Select Supplier</option>
                <?php while ($row = mysqli_fetch_array($fetchQuery)) { ?>
                  <option value="<?php echo $row['s_name']; ?>"><?php echo $row['s_name']; ?></option>
                <?php } ?>
                </select>
              </div>
             </div>
             <br>
             <div class="row">
               <div class="col-lg-4">
                <input type="text" class="form-control" name="category" placeholder="Category..." />
              </div>
               <div class="col-lg-4">
                <input type="number" class="form-control" required name="p_cost" placeholder="Cost per item..." />
              </div>
              <div class="col-lg-4">
                <input type="number" class="form-control" required name="p_qty" placeholder="Quantity..." />
              </div>
             </div>
             <br>
             <div class="row">
                <div class="col-lg-12">
                  <textarea class="form-control" rows="6" name="descr" placeholder="Description..."></textarea>
                </div>      
             </div>
              <br>
              <div class="btn-group pull-right">
			   <button type="submit" name="submitStock" class="btn btn-success">Add Record</button>
              <button type="reset" class="btn btn-danger">Cancel</button>
             
              </div>
              <br><br>
            </form>
          </div>
          <div class="tab-pane" id="stock">
              <br><br>
            <table class="table" border="1" id="data-table3">
              <thead>
              <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Supplier</th>
                <th class="text-center">Category</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Total Cost</th>
				<th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php  
              //Fetching Data From DB (Sale)
              $queryStock = "SELECT * FROM `dep_stock` ORDER BY date DESC";
              $result1 = mysqli_query($link, $queryStock);
               while ($row = mysqli_fetch_array($result1)) { ?>
                
                <tr>
                  <td><?php echo $row['p_name']; ?></td>
                  <td><?php echo $row['p_type']; ?></td>
                  <td><?php echo $row['supplier']; ?></td>
                  <td class="text-center"><?php echo $row['category']; ?></td>
                  <td><?php echo $row['p_cost']; ?></td>
                  <td><?php echo $row['p_qty']; ?></td>
                  <td><?php echo $row['p_cost'] * $row['p_qty']; ?></td>
				  <td class="text-center">
                    
                     <a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" title="Sale"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="../app/func.php?del=<?php echo $row['id']?>" title="Delete" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--*********************-->
<!-- Expenses -->
<div class="modal fade" id="expenses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Expenses</h4>
      </div>
      <div class="modal-body">
       <ul class="nav nav-tabs" role="tablist" id="myTab">
          <li class="active"><a href="#addex" role="tab" data-toggle="tab">Add Expense</a></li>
          <li><a href="#expense" role="tab" data-toggle="tab">Expenses</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="addex">
            <br><br>
            <form method="POST" action="../app/func.php">
            <div class="row">
              <div class="col-lg-6">      
                <input type="text" class="form-control" required name="e_item" placeholder="Item Name..." />
              </div>
              <div class="col-lg-6">
                <input type="number" class="form-control" required name="e_price" placeholder="Price..." />
              </div>
             </div>
             <br>
             <div class="row">
                <div class="col-lg-12">
                  <textarea class="form-control" rows="6" name="e_descr" placeholder="Description..."></textarea>
                </div>
             </div>
              <br>
              <div class="btn-group pull-right">
			    <button type="submit" name="submitEx" class="btn btn-success">Add Record</button>
              <button type="reset" class="btn btn-danger">Cancel</button>
            
              </div>
              <br><br>
            </form>
          </div>
          <div class="tab-pane" id="expense">
            <br><br>
            <table class="table" border="1" id="data-table4">
              <thead>
              <tr>
                <th>Date</th>
                <th>Item</th>
                <th>Price</th>
                <th>Description</th>
				<th class="text-center">Action</th>
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
				   <td class="text-center">
                    
                     <a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" title="Sale"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="../app/func.php?del=<?php echo $row['id']?>" title="Delete" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--*********************-->

<!-- Patients Book -->
<div class="modal fade" id="patients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Patients Book</h4>
      </div>
      <div class="modal-body">
            <br><br>
            <table class="table" border="1" id="data-table5">
              <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Product</th>
				<th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php  
              //Fetching Data From DB (Sale)
              $queryex = "SELECT * FROM `dep_sale` ORDER BY `c_name` DESC";
              $result2 = mysqli_query($link, $queryex);
               while ($row = mysqli_fetch_array($result2)) { ?>  
                <tr>
                  <td><?php echo $row['c_name']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['frame']; echo ",", $row['size']; echo ",", $row['lense']; ?></td>
				   <td class="text-center">
                    
                     <a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" title="Sale"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="../app/func.php?del=<?php echo $row['id']?>" title="Delete" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php } ?> 
              </tbody>
            </table>
          </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--*********************-->
