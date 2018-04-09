<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="myStyle.css"/>
        <style>
            .displaystaff_content table,th,td {
			padding:6px;
			border: 1px solid #2E4372;
			border-collapse: collapse;
}
        </style>
        <title>Edit Customer</title>
    </head>
    <?php include 'header.php'?>
    <?php include 'admin_bar.php'?>
    			<?php
					if(isset($_REQUEST['added'])){
						echo '<script>alert("Customer Deleted.");';
        				echo 'window.location= "delete_customer.php";</script>';
					}
				?>
                <div class="displaystaff_content">
                <form action="edit.php" method="POST">
            
                    <table align="center">
                        
                        <th>Account Number</th>
                        <th>name</th>
                 
						<?php
						include 'dbms.php';
							$sql="SELECT * FROM `customer_details`";
							$result = $conn->query($sql);
						if($result->num_rows>0)
						{
                       	 	while($row= $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "</tr>";
							}
                        }
                        ?>
                    </table>
                    <table align="center">
                        <tr>
                            <td>
                            	<input type="text" name="customer_id">
                                <input type="submit" name="submit2_id" value="EDIT CUSTOMER DETAILS" class='addstaff_button'/>
                            </td>
                        </tr>
                    </table>
                </form>
	<?php

	if(isset($_POST['submit2_id']))
	{
		$_SESSION['id1']=$_POST['customer_id'];
		//echo $_SESSION['id1'];
		$sql="SELECT * FROM login where  login_id='$_SESSION[id1]'";

							$result=mysqli_query($conn,$sql);
							
							if(!$row=mysqli_fetch_assoc($result))
							{
								echo "Invalid ID";
				   }
				   else{
		header("location: edit_customer.php?");
				   }
	}
	?>
            
                </div>