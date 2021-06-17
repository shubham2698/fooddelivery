<?php
require('connection.inc.php');
function pr($arr){

	echo '<pre>';
	print_r($arr);
}

function prx($arr){

	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($connection,$str){

	if(($str!='')){
		$str = trim($str);
		return mysqli_real_escape_string($connection,$str);
	}
}

function get_product(){
	$sql ="select * from product";
	$res=mysql_query($connection,"select * from products");
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

?>