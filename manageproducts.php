<?php
require('header.inc.php');
require('connection.inc.php');
require('functions.inc.php');
require('Welcome_text.inc.php');

$pname='';
$pmrp='';
$pprice='';
$pqty='';
$pimage='';
$psts='';
$psdesc='';
$pldesc='';




if(isset($_GET['type']) && $_GET['type'] != ''){
  $type=get_safe_value($connection,$_GET['type']);
  if($type=='status'){
    $operation=get_safe_value($connection,$_GET['operation']);
    $id=get_safe_value($connection,$_GET['id']);
      if($operation == 'active'){
        $status ='1';
      }else{
        $status ='0';
      }
    $update_status = "UPDATE products SET product_status='$status' WHERE id='$id'";
    mysqli_query($connection,$update_status);

  }

  if($type=='delete'){
    
    $id=get_safe_value($connection,$_GET['id']);
    $delete_sql = "delete from products where id='$id'";
    mysqli_query($connection,$delete_sql);

  }
  
}

$msg="";
if(isset($_POST['addproduct'])){

  $categories_no=get_safe_value($connection,$_POST['categories']);
  $product_name=get_safe_value($connection,$_POST['pname']);
  $product_mrp=get_safe_value($connection,$_POST['pmrp']);
  $product_price=get_safe_value($connection,$_POST['pprice']);
  $product_quantity=get_safe_value($connection,$_POST['pqty']);
  $product_image=get_safe_value($connection,$_POST['pimage']);
  $product_sdescp=get_safe_value($connection,$_POST['psdesc']);
  $product_ldescp=get_safe_value($connection,$_POST['pldesc']);
  


  $res=mysqli_query($connection,"select * from products where product_name='$product_name' ");
  $check= mysqli_num_rows($res);
  if($check > 0){
    $msg ="Product Already Exist";

  }else{

  $sql = mysqli_query($connection,"insert into products(categories_id,product_name,product_mrp,product_selling_price,product_quantity,product_image,product_status,product_sdescp,product_ldescp) values('$categories_no','$product_name','$product_mrp','$product_price','$product_quantity','$product_image','$psts','$product_sdescp','$product_ldescp')");
  }
}

$sql = "select products.*,categories.categorie_sname from products,categories where products.categories_id=categories.categories_id order by products.id desc";
$res =mysqli_query($connection,$sql);


?>




<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adminpanel.php">< Back To Admin Panel</a></li>
  </ol>
</nav>


<button type="button" class="btn btn-light active" ><a style="text-decoration:none;" href="#">Manage Product</a></button>
<a style="text-decoration:none;" href="#add">+Add Products</a>


<div style="margin-top: 1%";>
<h4>Manage Products</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product id</th>
      <th scope="col">Categorie</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">MRP</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i=1;
    while($row=mysqli_fetch_assoc($res)) {?>
    <tr>
      <th class="serial"><?php echo $row['id']; ?></th>
      <td> <?php echo $row['categorie_sname']; ?></td>
      <td> <?php echo $row['product_name']; ?></td>
      <td> <?php echo $row['product_image']; ?></td>
      <td> <?php echo $row['product_mrp']; ?></td>
      <td> <?php echo $row['product_selling_price']; ?></td>
     <td> <?php echo $row['product_quantity']; ?></td>
      <td><?php 
          if($row['product_status']=='1'){

            echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a>&nbsp";
          }else{

             echo "<a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a>&nbsp";
          }
             echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>&nbsp";
          ?>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>


<div style="margin-top: 5%"; id="add">
<h4 >  +Add Product</h4>
<form method="post">
  <div class="form-group" style="margin-left: 25%; width: 40%;"  >
    <label for="sel1">Select Categorie:</label>
      <select class="form-control" id="sel1" name="categories"  >
          <option disabled selected value> -- select an option -- </option>
          <?php
           $res=mysqli_query($connection,"select categories_id,categorie_sname from categories order by categorie_sname asc");
              while ($row=mysqli_fetch_assoc($res)) {
                echo"<option value=".$row['categories_id'].">".$row['categorie_sname']."</option>";
           }

          ?>
      </select>


  

    Product Name:<input type="text" name="pname" class="form-control"  placeholder="Type product name here..." required value="<?php echo $pname; ?>">

    Product MRP:<input type="number" name="pmrp" class="form-control"  placeholder="Type product mrp here..."  required value="<?php echo $pmrp; ?>">

    Product Price:<input type="number" name="pprice" class="form-control"  placeholder="Type product price here..."  required value="<?php echo $pprice; ?>">

    Product Quantity:<input type="number" name="pqty" class="form-control"  placeholder="Type product quantityd here..."  required value="<?php echo $pqty; ?>">

    Product Image:<input type="text" name="pimage" class="form-control"  placeholder="Type product image url here..."  required value="<?php echo $pimage; ?>">

    Product Status:<input type="number" name="psts" class="form-control"  placeholder="Type product status here..." min="0" max="1" required value="<?php echo $psts; ?>">

    Product ShortDesc:<input type="text" name="psdesc" class="form-control"  placeholder="Type product Short Descp..."  required value="<?php echo $psdesc; ?>">

    Product LongDesc:<textarea type="text" name="pldesc" class="form-control"  placeholder="Type product long Descp..."  required value="<?php echo $pname; ?>"></textarea>

    
    
  </div>
  <button type="submit" name="addproduct" class="btn btn-primary" style="margin-left: 40%;" >Add Product</button>
  <div style="color:red"><?php echo $msg; ?></div>
</form>
</div>




<?php

require('footer.inc.php');

?>