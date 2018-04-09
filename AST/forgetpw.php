<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forget password</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
           
		<?php include 'header.php'?>
            <div class='forgetpw'>
            <form action="forgetpw.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Account no.</td>
                        <td><input type="text" name="id" required=""/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" required=""/></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><input type="date" name="dob" required=""/></td>
                    </tr>
                    <tr>
                        <td>Phone no</td>
                        <td><input type="text" name="phone" required=""/></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="ok" value="OK" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
 <?php
include 'dbms.php';
if(isset($_POST['ok']))
{
$id=$_POST['id'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$_SESSION['user_id']=$id;
//echo $_SESSION['user_id'];

$sql="select * from customer_details where id= '$id' and DOB='$dob' and email='$email' and phone_no='$phone'";


$result=mysqli_query($conn,$sql);


if(!$row=mysqli_fetch_assoc($result) )
	{
		echo "Wrong Information";
	}
	else 
	{	
		header("location: forget.php");
	}
}
$conn->close();
?>

</div>