              
              <?php
              //Connections
              require_once '../app/config/config.php'; 
              //Sale Update
              
              if (isset($_POST['update'])) {
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
                $setquery = "UPDATE `dep_sale` SET c_name='$name', c_mob='$mobile', d_date='$dDate', frame='$frame', size='$size', lense='$lense', descr='$descr',c_refer='$refer', paid='$paid', remains='$remains',
                dr_sph='$dr_sph',dr_cyl='$dr_cyl',dr_axis='$dr_axis',dr_va='$dr_va',dl_sph='$dl_sph',dl_cyl='$dl_cyl',dl_axis='$dl_axis',dl_va='$dl_va',nr_sph='$nr_sph',nr_cyl='$nr_cyl',nr_axis='$nr_axis',nr_va='$nr_va',nl_sph='$nl_sph',nl_cyl='$nl_cyl',nl_axis='$nl_axis',nl_va='$nl_va' WHERE id='".$_POST["id"]."'";
                mysqli_query($link, $setquery); 
                header("location: reports.php");
              }

              //Stock Update
              if (isset($_POST['updateStock'])) {
                $product = $_POST['p_name'];
                $ptype = $_POST['p_type'];
                $descr = $_POST['descr'];
                $category = $_POST['category'];
                $cost = $_POST['p_cost'];
                $qty = $_POST['p_qty'];
                $supplier = $_POST['supplier'];

                //Inserting Data
                $stockquery = "UPDATE `dep_stock` SET p_name='$product', p_type='$ptype', descr='$descr', category='$category', p_cost='$cost', p_qty='$qty', supplier='$supplier' WHERE id='".$_POST["id"]."'";
                mysqli_query($link, $stockquery); 
                header("location: reports.php");
              }

              //Expense Update
              if (isset($_POST['updateExpense'])) {
                $item = $_POST['e_item'];
                $price = $_POST['e_price'];
                $descr = $_POST['e_descr'];

                //Inserting Data
                $expensequery = "UPDATE `dep_expenses` SET e_item='$item', e_price='$price', e_descr='$descr' WHERE id='".$_POST["id"]."'";
                mysqli_query($link, $expensequery); 
                header("location: reports.php");
              }
              ?>