<?php 
session_start();

session_destroy();

$role=$_GET['role'];

if($role=='admin')
{
header("Location: admin.php");
}
else{
header("Location: customer.php");	
}

 
exit();
?>
