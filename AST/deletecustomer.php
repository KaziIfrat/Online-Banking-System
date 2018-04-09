<?php
include 'dbms.php';
$id=$_POST['customer_id'];

$sql="delete from customer_details where id=$id";

if($conn->query($sql)== TRUE)
	header("location: delete_customer.php?added=1");
else 
	header("location: delete_customer.php?added=0");
$sql="delete from accounts where account_no=$id";
$conn->query($sql);
$sql="delete from login where login_id=$id";
$conn->query($sql);
$conn->close();
?>

