
<?php
include 'dbms.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Customer</title>
<link href="myStyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include 'header.php'?>
	<?php include 'admin_bar.php'?>
  
    <?php
					if(isset($_REQUEST['edited'])){
						echo '<script>alert("Customer Edited.");';
        				echo 'window.location= "Edit_customer.php";</script>';
					}
				?>
    <?php
           // echo $_SESSION['id1'];  
		include 'dbms.php';
		
		$sql="SELECT * FROM customer_details WHERE id='$_SESSION[id1]' ";
		$result=mysqli_query($conn,$sql);
		$rws=mysqli_fetch_assoc($result);
	
		$name= $rws['name'];
		$dob=$rws['DOB'];
		$nominee=$rws['nominee'];
		$mobile=$rws['phone_no'];
		$email=$rws['email'];
		$address=$rws['address'];
		
		?>
        
    <form method="post" action="">
    <div class="editcustomer">
        <table align="center">
        <tr>
        <td>Customer's name</td>
        <td><input type="text" name="customer_name" value="<?php echo $name ?>" required /></td>
        </tr>
        
        <tr>
        <td>
        DOB
        </td>
        <td>
        <input type="date" name="customer_dob" value="<?php echo $dob ?>" required=""/>
        </td>
        </tr>
        <tr>
        <td>Nominee</td>
        <td><input type="text" name="customer_nominee" value="<?php echo $nominee ?>" required=""/></td>
        </tr>
        
        <tr>
        <td>Address:</td>
        <td><input type="text" name="customer_address" value="<?php echo $address ?>"required=""/></td>
        </tr>
        
        <tr>
        <td>Mobile</td>
        <td><input type="text" name="customer_mobile" value="<?php echo $mobile ?>"required=""/></td>
        </tr>
        
        <tr>
        <td>Email id</td>
        <td><input type="email" name="customer_email" value="<?php echo $email ?>" required=""/></td>
        </tr>
        
        <tr>
        <td colspan="2" align="center" style="padding-top:20px"><input type="submit" name="edit_cus" value="Edit Customer" class="addcus_button"/></td>
        </tr>
        </table>
    </div>
    </form>
    
    
<?php
if(isset($_POST['edit_cus']))
{
include 'dbms.php';

$customer_name=$_POST['customer_name'];
$dob=$_POST['customer_dob'];
$nominee=$_POST['customer_nominee'];
$address=$_POST['customer_address'];
$mobile=$_POST['customer_mobile'];
$email=$_POST['customer_email'];

$sql1="UPDATE `customer_details` SET `name`='$customer_name',`DOB`='$dob',`nominee`='$nominee',`email`='$email',`phone_no`='$mobile',`address`='$address' WHERE id='$_SESSION[id1]'";
$ret = mysqli_query($conn,$sql1);

if($ret == TRUE) header("location: edit_customer.php?edited=1");
else header("location: edit_customer.php?edited=0");
$conn->close();

}
?>
    </body>
</html>
