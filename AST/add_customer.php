<?php
include 'dbms.php';


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Customer</title>
<link href="myStyle.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php include 'header.php'?>
	<?php include 'admin_bar.php'?>
    <?php
		if(isset($_REQUEST['added'])){
			echo '<script>alert("Customer Added.");';
        	echo 'window.location= "add_customer.php";</script>';
		}
	?>
    <form method="post" action="addcustomer.php">
    <div class="addcustomer">
        <table align="center">
        <tr>
        <td>Customer's name</td>
        <td><input type="text" name="customer_name" required=""/></td>
        </tr>
        <tr>
        <td>Gender</td>
        <td>
        M<input type="radio" name="customer_gender" value="M" checked/>
        F<input type="radio" name="customer_gender" value="F" />
        </td>
        </tr>
        <tr>
        <td>
        DOB
        </td>
        <td>
        <input type="date" name="customer_dob" required=""/>
        </td>
        </tr>
        <tr>
        <td>Nominee</td>
        <td><input type="text" name="customer_nominee" required=""/></td>
        </tr>
        <tr>
        <td>Account type</td>
        <td>
        <select name="customer_account">
        <option>savings</option>
        <option>current</option>
        </select>
        </td>
        </tr>
        <tr>
        <td>Minimum amount</td>
        <td><input type="text" name="initial" value="1000" min="1000" required=""/></td>
        </tr>
        <tr>
        <td>Address:</td>
        <td><textarea name="customer_address" required></textarea></td>
        </tr>
        <tr>
        <td>Mobile</td>
        <td><input type="text" name="customer_mobile" required=""/></td>
        </tr>
        <tr>
        <td>Email id</td>
        <td><input type="email" name="customer_email" required=""/></td>
        </tr>
        <tr>
        <td>Account number</td>
        <td><input type="text" name="account_number" required=""/></td>
        </tr>
        <tr>
        <td>Password</td>
        <td><input type="password" name="customer_pwd" required=""/></td>
        </tr>
        <tr>
        <td colspan="2" align="center" style="padding-top:20px"><input type="submit" name="add_customer" value="Add Customer" class="addcus_button"/></td>
        </tr>
        </table>
    </div>
    </form>
    </body>
</html>
