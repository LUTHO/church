<?php


$con = mysqli_connect('localhost', 'root', '', 'church');

if(mysqli_connect_errno()){
	echo "Database failed to connect because of these reasons:". mysqli_connect_error();
	die(); 
}

require_once $_SERVER['DOCUMENT_ROOT'].'/church/config.php';
?>
