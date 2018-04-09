<?php
include 'dbms.php';

$customer_name=$_POST['customer_name'];
$customer_gender=$_POST['customer_gender'];
$dob=$_POST['customer_dob'];
$nominee=$_POST['customer_nominee'];
$Account_type=$_POST['customer_account'];
$min_amount=$_POST['initial'];
$address=$_POST['customer_address'];
$mobile=$_POST['customer_mobile'];
$email=$_POST['customer_email'];
$acnumber=$_POST['account_number'];
$password=$_POST['customer_pwd'];
$role="1";


$sql1="INSERT INTO `login` (`roll`, `login_id`, `passwrd`, `last_login`) VALUES ('$role','$acnumber','$password','')";
$ret = mysqli_query($conn,$sql1);
$sql="INSERT INTO `customer_details` (`id`, `name`, `gender`, `DOB`, `nominee`, `email`, `phone_no`, `address`) VALUES ($acnumber,'$customer_name','$customer_gender','$dob','$nominee','$email','$mobile','$address')";
$result=mysqli_query($conn,$sql);
$sql2="INSERT INTO `accounts`(`account_no`,`balance`,`last_login`) VALUES ('$acnumber',1000,'')";
$result2=mysqli_query($conn,$sql2);


//$conn->query($sql);

if($result2 == TRUE) header("location: add_customer.php?added=1");
else header("location: add_customer.php?added=0");
$conn->close();
?>

