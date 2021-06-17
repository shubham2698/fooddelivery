<?php
require('header.inc.php');
require('connection.inc.php');
require('functions.inc.php');

$msg ='';

if(isset($_POST['submit_login'])){

   $username=get_safe_value($connection,$_POST['inputEmail4userlogin']);
   $password=get_safe_value($connection,$_POST['inputPassword4userlogin']);
   $sql_query=" select * from userlogindata where user_email='$username' and user_password='$password'";
   $result = mysqli_query($connection,$sql_query);
   $count=mysqli_num_rows($result);
   if($count>0){
      session_start();
      $_SESSION['USER_LOGIN']='yes';
      $_SESSION['USER_NAME']=$username;
      header('location:index.php');
      die();
   }
   else{

      $msg="Please Enter Correct Username/Password";
   }
}



?>

<div class="card" >
  <h5 class="card-header">Are You New User?<span><a href="#signup"> Register Here </a></span>Or Already User Login Here.</h5>
</div>

<form style="width:70%; margin-left: 15%; margin-top: 3%; font-family: 'Courgette', cursive"; method="POST" >
<div class="form-group ">
      <label for="inputEmail4userlogin">Email</label>
      <input type="email" class="form-control" name="inputEmail4userlogin" placeholder="Email@email.com">
</div>

<div class="form-group">
    <label for="inputPassword4userlogin">Password</label>
    <input type="Password" class="form-control" name="inputPassword4userlogin" >
</div>

<button type="submit" name="submit_login" class="btn btn-primary">Sign in</button>
<?php echo $msg ?>
</form>



<div class="card" id="signup" style="margin-top: 2%;">
  <h5 class="card-header">Register in Here.</h5>
</div>


<form style="width:70%; margin-left: 15%; margin-top: 3%; font-family: 'Courgette', cursive"; >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername4">Username</label>
      <input type="text" class="form-control" name="inputUsername4" placeholder="Shubham">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="inputEmail4" placeholder="Email@email.com">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="Password" class="form-control" name="inputPassword" >
  </div>
  <div class="form-group">
    <label for="inputCPassword">Confirm Password</label>
    <input type="Password" class="form-control" name="inputCPassword" >
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="inputAddress" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-group">
    <label for="inputphone">Mobile No</label>
    <input type="number" class="form-control" name="inputphone" placeholder="+917264808928">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select name="inputState" class="form-control">
        <option selected>Choose..</option>
        <option>Maharashtra</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" name="submit_register" class="btn btn-primary">Register</button>
</form>






<?php
require('footer.inc.php');
?>