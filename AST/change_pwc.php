
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
    <?php include 'header.php'?>
           <?php include 'customer_bar.php'?>
<?php
	 
		if(isset($_REQUEST['added'])){
			echo '<script>alert("Password changed.");';
			if($_SESSION['role']=='1')
        	echo 'window.location= "customer_homepage.php";</script>';
			else
        	echo 'window.location= "admin_homepage.php";</script>';
			
	
		}
	?>
	
            <div class='change_pwc'>
            <form action="change_pwc.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Enter old password</td>
                        <td><input name="old_password" type="password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter new password</td>
                        <td><input name="new_password" type="password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter password again</td>
                        <td><input name="again_password" type="password" required=""/></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="change_password" value="Change Password" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
 <?php
include 'dbms.php';
if(isset($_POST['change_password']))
{
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$again_password=$_POST['again_password'];


if($new_password != $again_password)
{
   echo "Password not match"; 
  
}
else{

$sql="select * from login where login_id = '$_SESSION[user_id]' and passwrd = '$old_password' and roll=$_SESSION[role]";


$result=mysqli_query($conn,$sql);


if(!$row=mysqli_fetch_assoc($result) )
	{
		//header("location: change_pws.php");
		echo "Your Old password is incorrct!";
	}
	else if($_SESSION['role']==0)
	{
			$sql1="UPDATE `login` SET `passwrd`='$new_password' WHERE login_id = '$_SESSION[user_id]'";
			$result1=mysqli_query($conn,$sql1);
			//echo "Password Changed.";
			header("location: change_pwc.php?added=1");
			$conn->close();

	}
	else 
	{
			$sql1="UPDATE `login` SET `passwrd`='$new_password' WHERE login_id = '$_SESSION[user_id]' and roll=$_SESSION[role]";
			$result1=mysqli_query($conn,$sql1);
			//header("location: customer_homepage.php");
			//echo "Password Changed.";
			header("location: change_pwc.php?added=1");
			$conn->close();

	}
	}
}
?>

</div>