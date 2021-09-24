<?php 
session_start();
include "includes/start.php";
// other code goes here


// CHECK IF THE USER IS LOGIN IN THE DISPLAY THE PAGE CONTENT
// <?php 
 if ($_SESSION['ROLE'] == 1 || $_SESSION['ROLE'] == 2  || $_SESSION['ROLE'] == 3) {
 	# code...
 
	

// include header here
include "includes/header.php";
?>
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <!-- left -->
        </div>
        <div class="col-md-8">
          
      <h3 class="float-left">My Store</h3> 
      <?php
      if ($_SESSION['ROLE'] == 1 || $_SESSION['ROLE'] == 2 ){
      ?>
<a href="drinks.php" class="float-right"> << Back to drinks panel</a>
      <?php
        }else{
          // echo "sisi";
        }
      ?>
            
<p><input type="search" oninput="w3.filterHTML('#searchStore','.item',this.value)" placeholder="Search Drinks in Store" class="form-control"></p>
<div id="storePrint">
 <center> <h4 id="titleHeading"></h4></center>
<table class="table table-hover" id="searchStore">
  <thead>
   <tr>
      <th>Drink Name</th>
    <th>Category</th>
    <th>Drinks Total</th>
    <th>Drinks in store</th>
    <th>Drinks Sold</th>

    <th>
      <button class="btn btn-small btn-dark" onClick="printedText(),printdiv('storePrint');">Print</button>
      
    </th>
   </tr>
  </thead>
  <tbody>
    <?php 
$store = $mysqli->query(
  "SELECT product_name,categories_name,instore,sold,instore+sold AS total FROM store,categories WHERE category = categories_id && store_deleted = 0 ORDER BY instore DESC") or die("ERROR 5000");
    while($rows = $store->fetch_assoc()):


     ?>
   <tr class="item">
  <td><?php echo $rows['product_name']; ?></td>
  <td><?php echo $rows['categories_name']; ?></td>
  <td><?php echo $rows['total']; ?></td>
  
 <td><?php 
                        if ($rows['instore'] <= 5 && $rows['instore'] != 0) {
                            # code...
                          $pname = $rows['product_name'];
                            echo "<p class='text-danger'>".$rows['instore']."</p>";
                      echo "<script> alert('There are lower than 6 {$pname} in store, please go to Drinks panel to add more in store')</script>";

                        }else{
                            echo "<p class='text-info'>".$rows['instore']."</p>";
                        }
                     

                    ?></td>
  <td><?php echo $rows['sold']; ?></td>

   </tr>
   <?php 
    endwhile;

  ?>
                
  </tbody>
</table>
</div>

        </div>
        <div class="col-md-2">
          <!-- right -->
        </div>
      </div>
    </div>
   
  <?php
        include "includes/footer.php";
 }else{
 	   $message = "Access Denied!";
       header("location: login.php?success=$message");
       exit();
 }
 // end of session check

?>