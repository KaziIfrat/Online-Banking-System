<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Online Banking</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
<div class="body">
	<div class="container">
    	<img src="img.png">
    	<form method="post" action="login.php">
        	<div class="form-input">
            	<input type="text" name="username"
                placeholder="User ID">
            </div>
            <div class="login-as">
                Login as <select name="role">
                    <option value="1">Customer</option>
                    <option value="0">Admin</option>
                </select> 
            </div>
        	<div class="form-input">
            	<input type="password" name="password"
                placeholder="Password">
            </div>
            <br>
            <input type="submit" name="submit" value="LOGIN"
            
            class="loginBtn"><br><br>
            <a href="forgetpw.php">Forget password?</a>
        </form>
                <?php
include 'dbms.php';
session_start();
if(isset($_POST['submit']))
{
$username1=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$sql="select * from login where login_id='$username1' and passwrd='$password' and roll=$role";

$result=mysqli_query($conn,$sql);

if(!$row=mysqli_fetch_assoc($result) )
	{
		echo "Your userid or password is incorrct!";
	}
	else if($role==0)
	{
			$_SESSION['user_id'] = $username1;
			$_SESSION['user_ps'] = $password;
			$_SESSION['role'] = $role;		
			header("location: admin_homepage.php");
	}
	else 
	{
			$_SESSION['user_id'] = $username1;
			$_SESSION['user_ps'] = $password;
			$_SESSION['role'] = $role;
			header("location: customer_homepage.php");
	}
	
}
?>
    </div>
    </div>

</body>
</html>

