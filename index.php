<?php
require('header.inc.php');
require('connection.inc.php');
require('functions.inc.php');

$cart_pname='';
$cart_cust_name='';
$qty='';
$user_name='';
$user_mobile='';
$user_address='';


$category_query ="select * from categories where categories_status=1";
$cat_res=mysqli_query($connection,$category_query);
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){

  $cat_arr[]=$row;
}

if(isset($_POST['add_to_cart'])){

  $cart_product_name=get_safe_value($connection,$_POST['cart_pname']);
  $cart_user_email=get_safe_value($connection,$_POST['cart_cust_name']);
  $cart_qty=get_safe_value($connection,$_POST['qty']);
  $pp_price=get_safe_value($connection,$_POST['p_price']);
  
 
  $user_data_query = mysqli_query($connection,"select * from userlogindata where user_email='$cart_user_email'");

  $res = mysqli_fetch_assoc($user_data_query);
  extract($res);
  $cust_sname= $user_name;
  $cust_sphone= $user_mobile;
  $cust_saddress= $user_address;
  $order_sstatus='';
  $payment_sstatus='';
  
  
  mysqli_query($connection,"insert into cart(order_name,cust_name,cust_email,cust_phone,cust_address,order_quantity,pr_price,order_status,payment_status) values('$cart_product_name','$cust_sname','$cart_user_email','$cust_sphone','$cust_saddress','$cart_qty','$pp_price','$order_sstatus','$payment_sstatus')");

}




?>


<table class="table_fp">                                                             <!-- Category And Banner -->
  <tr>
    <td>
      <div class="vertical-menu" style="top: 0px;">
      
        <a href="#" style="background-color: grey;" >CATEGORY</a>
        <?php
          foreach($cat_arr as $list){
        ?>
        <a href="#<?php echo $list['categorie_sname'] ?>"><?php echo $list['categorie_sname'] ?></a>
        <?php
        }
        ?>
        
      </div>
    </td>

    <td style="width: 100%;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active carousel-img" >
                    <img class="d-block w-100" src="banner2.jpg" alt="First slide" style="height: 432px; width: 100%;">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="banner2.jpg" alt="Second slide" style="height: 432px; width: 100%;">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="banner2.jpg" alt="Third slide" style="height: 432px; width: 100%;">
                </div>
            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span></a>

              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
        </div>
    </td>
  </tr>
</table>
                        <!-- Category And Banner End-->

    



<section id="FrontPage"  >                                                  
  <!-- Main Products Mix -->
      <div class="container">
    
        <div id="Starters"></div><br><br><br><br>
            <div class="title" >
                <div class="page-header"  style="font-family: 'Courgette', cursive; ">
                  <h1>Starters</h1>
                </div> <!-- blank -->
            </div>
            
    <div class="row">
      <?php
      $category_starter ="select * from products where product_status =1 ";
    $cat_star=mysqli_query($connection,$category_starter);
    $cat_arrs=array();
    while($row=mysqli_fetch_assoc($cat_star)){

        $cat_arrs[]=$row;
      }
    ?>
      <?php
          foreach($cat_arrs as $list){
        ?>
  <div class="col-md-3">
        <form method="POST">
        <div class="card text-center">
          <img src=<?php echo $list['product_image'] ?> >
            <div class="card-body">
                <h5 class="card-title"><?php echo $list['product_name'] ?></h5>
                <p class="card-text"><?php echo "Price:".$list['product_selling_price'] ?></p>
                Quantity:<input name="qty" type="number" min="0" max="3" value="1" required style="width: 20%;">
                    <input name="cart_pname" type="hidden" value="<?php echo $list['product_name'] ?>"  >
                    <input name="cart_cust_name" type="hidden"   >
                    <input name="p_price" type="hidden" value="<?php echo $list['product_selling_price'] ?>">
                </p>
                <button  type="submit" name="add_to_cart" style="border:1px solid orange; border-radius: 15px; padding: 5px; color: red; text-decoration: none;">Add To Cart</button>
            </div>
        </div>
        </form>
      </div>
      <?php
        }
        ?>
      

    </div>


    

    


  </div> <!-- container End -->

</section>






<?php
require('footer.inc.php');
?>