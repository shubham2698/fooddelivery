<?php
require('header.inc.php');
require('connection.inc.php');
require('functions.inc.php');
require('welcome_text_login.inc.php');
$msg ='';

if(isset($_POST['submit'])){

   $username=get_safe_value($connection,$_POST['username']);
   $password=get_safe_value($connection,$_POST['password']);
   $sql_query=" select * from admin_users where username='$username' and userpassword='$password'";
   $result = mysqli_query($connection,$sql_query);
   $count=mysqli_num_rows($result);
   if($count>0){

      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('location:adminpanel.php');
      die();
   }
   else{

      $msg="Please Enter Correct Username/Password";
   }
}
?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

   </head>
   <body class="bg-light">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form>
               <div style="color: red; margin-top: 10px;"><?php echo $msg ?></div>
               </div>
            </div>
         </div>
      </div>
      
</html>
<?php
require('footer.inc.php');
?>
