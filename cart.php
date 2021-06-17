<?php
require('header.inc.php');
require('connection.inc.php');
$msh="";
if(empty($_SESSION['USER_NAME'])){
	$msh="You Need To Login First";
	echo $msh;
    exit();
}

?>


<br>
<h1 style="font-family: 'Courgette', cursive">Your Cart</h1>
<br>

<div style="margin-top: 1%";>
  <table class="table" style="font-family: 'Courgette', cursive">
  <thead>
    <tr>
      <th scope="col"> id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $ce=$_SESSION['USER_NAME'];

    $sql=mysqli_query($connection,"select * from cart where cust_email='$ce'");
    $i=1;
    while($row=mysqli_fetch_assoc($sql)) {?>
    <tr>
      <th class="serial"><?php echo $row['order_id']; ?></th>
      <td> <?php echo $row['order_name']; ?></td>
      <td> <?php echo $row['order_quantity']; ?></td>
      <td> <?php if($row['order_quantity']==2){echo ($row['pr_price']*2);}elseif($row['order_quantity']==3){echo ($row['pr_price']*3);} else {echo $row['pr_price'];}?></td>
      
    </tr>
  <?php }  ?>
  </tbody>
</table>
</div>











<?php
require('functions.inc.php');
?>

