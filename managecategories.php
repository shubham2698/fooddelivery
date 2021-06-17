<?php
require('header.inc.php');
require('connection.inc.php');
require('functions.inc.php');
require('Welcome_text.inc.php');

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
    $update_status = "UPDATE categories SET categories_status='$status' WHERE categories_id='$id'";
    mysqli_query($connection,$update_status);

  }

  if($type=='delete'){
    
    $id=get_safe_value($connection,$_GET['id']);
    $delete_product ="delete from products where categories_id='$id'";
    $delete_sql = "delete from categories where categories_id='$id'";
    mysqli_query($connection,$delete_product);
    mysqli_query($connection,$delete_sql);

  }
  
}

$msg="";
if(isset($_POST['submit'])){

  $categories=get_safe_value($connection,$_POST['categories']);

  $res=mysqli_query($connection,"select * from categories where categorie_sname='$categories' ");
  $check= mysqli_num_rows($res);
  if($check > 0){
    $msg ="Category Already Exist";
  }else{

  $sql = mysqli_query($connection,"insert into categories(categorie_sname,categories_status) values('$categories','1')");
  }
}

$sql = "select * from categories order by categories_id";
$res =mysqli_query($connection,$sql);


?>




<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adminpanel.php">< Back To Admin Panel</a></li>
  </ol>
</nav>



<button type="button" class="btn btn-light active" ><a style="text-decoration:none;" href="managecategories.php">Manage Categories</a></button>
<a style="text-decoration:none;" href="#add">+Add Categories</a>



<div style="margin-top: 1%";>
<h4> All Categories</h4><br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Categories id</th>
      <th scope="col">Categories Name</th>
      <th scope="col">Categories Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i=1;
    while($row=mysqli_fetch_assoc($res)) {?>
    <tr>
      <th class="serial"><?php echo $row['categories_id']; ?></th>
      <td> <?php echo $row['categorie_sname']; ?></td>
      <td><?php 
          if($row['categories_status']=='1'){

            echo "<a href='?type=status&operation=deactive&id=".$row['categories_id']."'>Active</a>&nbsp";
          }else{

             echo "<a href='?type=status&operation=active&id=".$row['categories_id']."'>Deactive</a>&nbsp";
          }

          
          echo "<a href='?type=delete&id=".$row['categories_id']."'>Delete</a>&nbsp";
          ?>
      </td>
    </tr>
          <?php } ?>
  </tbody>
</table>
</div>



<div style="margin-top: 5%"; id="add">
<h4 >  +Add Categories</h4>
<form method="post">
  <div class="form-group" >
    <input type="text" name="categories" class="form-control"  placeholder="Type catagory name here..." style="width: 40%;" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" >Add Catagory</button>
  <div style="color:red"><?php echo $msg; ?></div>
</form>
</div>














<?php

require('footer.inc.php');

?>