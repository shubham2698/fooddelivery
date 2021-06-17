<?php

session_start();
	unset($_SESSION['USER_LOGIN']);
	unset($_SESSION['USER_NAME']);
	unset($_SESSION['ADMIN_LOGIN']);
	unset($_SESSION['ADMIN_USERNAME']);
	header('location:index.php');
	die();


?>