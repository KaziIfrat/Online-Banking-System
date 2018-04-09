<?php
include 'dbms.php';

 
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$again_password=$_POST['again_password'];
echo $_SESSION['user_id'];
echo $_SESSION['role'];

if($new_password != $again_password)
{
   echo $change;
  // echo $old_password; 
	
   echo "Password not match"; 
   //header("location: change_pw.php");
   //header("location: change_pw.php");
}
else{

$sql="select * from login where  passwrd='$old_password' and roll=$role";

$result=mysqli_query($conn,$sql);
if(!$row=mysqli_fetch_assoc($result) )
	{
		//header("location: change_pw.php");
		echo "Your Old password is incorrct!";
		
		//echo "Your userid or password is incorrct!";
	}
	else if($role==0)
	{
			
			header("location: admin_homepage.php");
	}
	else 
	{
			header("location: customer_homepage.php");
	}
	


//$conn->query($sql);

if($result == TRUE) header("location: change_pw.php?added=1");
else header("location: change_pw.php?added=0");
$conn->close();}
?>

