 <?php  
include '../app/config/config.php';
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $c_name = mysqli_real_escape_string($connect, $_POST["c_name"]);  
      $c_mob = mysqli_real_escape_string($connect, $_POST["c_mob"]);  
      $d_date = mysqli_real_escape_string($connect, $_POST["d_date"]);    
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE dep_sale   
           SET c_name='$c_name',   
           c_mob='$c_mob',   
           d_date='$d_date',   
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }    
      if(mysqli_query($link, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM dep_sale ORDER BY id DESC";  
           $result = mysqli_query($link, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 