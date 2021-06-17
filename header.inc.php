<!DOCTYPE html>
<html>

<head>
  <title>HomeFoodie</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script src="https://kit.fontawesome.com/90dbf666eb.js" crossorigin="anonymous"></script>

    <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
  <script type="text/javascript"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style1.css">
</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">             <!-- First Navbar -->
  
      <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

  <div class="collapse navbar-collapse " id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="font-style: italic;"><?php session_start(); if(isset($_SESSION['USER_NAME'])){  echo "Welcome: ".$_SESSION['USER_NAME'];}else{} ?></a>
      </li>
    </ul>
    <a href="cart.php"><i class="fas fa-shopping-cart fa-2x"  style="margin-right: 3%; "></i></a>
    <span class="navbar-text" style="margin-right: 100px;">
     <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Login/Signup
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php 
    
    if(isset($_SESSION['ADMIN_LOGIN'])){
      echo '<a class="dropdown-item" href="logout.php">LOGOUT</a>';
    }else{
      echo '<a class="dropdown-item" href="login.php">Admin Login</a>';
    }

    ?>
    <?php 
    
    if(isset($_SESSION['USER_LOGIN'])){
      echo '<a class="dropdown-item" href="logout.php">LOGOUT</a>';
    }else{
      echo '<a class="dropdown-item" href="userlogin.php">User Login</a>';
    }
      
    ?>
  </div>
</div>
    </span>
  </div>
</nav>                                                                              <!-- First Navbar End -->





<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">                         <!-- Second Navbar -->
  <a class="text-left " href="#" style="text-decoration: none; color:orange; font-size: 6vw;font-family: 'Courgette', cursive";  >HomeFoodie.<span style="font-size: 4vw;">com</span></a>
</nav>                                                                              <!-- Second Navbar End -->

