<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
    <?php include 'header.php'?>
            <?php
	 
		if(isset($_REQUEST['forget'])){
			echo '<script>alert("Password changed.");';
        	echo 'window.location= "login.php";</script>';
			
		}
	?>
	
            <div class='forget'>
            <form action="forget.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Enter new password</td>
                        <td><input type="password" name="new_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Confirm password</td>
                        <td><input type="password" name="again_password" required=""/></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="done" value="Done" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
 <?php
include 'dbms.php';
if(isset($_POST['done']))
{
$new_password=$_POST['new_password'];
$again_password=$_POST['again_password'];


	if($new_password != $again_password)
	{
	   echo "Password not match"; 
	  
	}
	else{
		
		$sql="UPDATE `login` SET `passwrd`='$new_password' WHERE login_id = '$_SESSION[user_id]'";
		mysqli_query($conn,$sql);
		header("location: forget.php?forget=1");
		$conn->close();
	
		
		}
}
?>

</div>