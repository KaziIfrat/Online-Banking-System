
<!DOCTYPE html>
<?php
include 'dbms.php';
$sql="SELECT * FROM `customer_details`";
$result = $conn->query($sql);
?>
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
         <title>Search Customer</title>
    </head>
    <?php include 'header.php'?>
    <?php include 'admin_bar.php'?>
    			
                <div class="displaystaff_content">
                   <form action="searchs.php" method="POST">
            
                    
                    <table align="center">
                        <tr>
                            <td width="500">
                            	<input type="text" name="search_input">
                                <input type="submit" name="submit2_id" value="SEARCH ID" class='addstaff_button'/>
                                <input type="submit" name="submit3_id" value="SEARCH NAME" class='addstaff_button'/>
                                <input type="submit" name="submit4_id" value="USER INFO" class='addstaff_button'/>
                            </td>
                        </tr>
                    </table>
                </form>
                <table align="center">
                        
                        <th>Account Number</th>
                        <th>name</th>
				<?php
				
				if(isset($_POST['submit2_id']))
				{
					 include 'dbms.php';
					 $userid=$_POST['search_input'];
							$sql="SELECT * FROM `customer_details` where id!='' and id like '%$userid%'";

							$result=mysqli_query($conn,$sql);
							
							if($result->num_rows>0)
							{
								while($row= $result->fetch_assoc()){
                            			echo "<tr>";
                            			echo "<td>".$row["id"]."</td>";
                            			echo "<td>".$row["name"]."</td>";
                            			echo "</tr>";}
							}
							else
							{
								echo "Not Found";
							}

				}
				if(isset($_POST['submit3_id']))
				{
					 include 'dbms.php';
					 $userid=$_POST['search_input'];
							$sql="SELECT * FROM `customer_details` where  '$userid' !='' and  upper(name) like upper('%$userid%')";

							$result=mysqli_query($conn,$sql);
							
							if($result->num_rows>0)
							{
								while($row= $result->fetch_assoc()){
                            			echo "<tr>";
                            			echo "<td>".$row["id"]."</td>";
                            			echo "<td>".$row["name"]."</td>";
                            			echo "</tr>";}
							}
							else
							{
								echo "Not Found";
							}

				}
				if(isset($_POST['submit4_id']))
				{
					 include 'dbms.php';
					 $_SESSION['user_id']=$_POST['search_input'];
							$sql="SELECT * FROM `customer_details` where  id='$_SESSION[user_id]'";

							$result=mysqli_query($conn,$sql);
							
							if($result->num_rows>0)
							{
								header("location: pinfo.php");
							}
							else
							{
								echo "Not Found";
							}

				}
			
				?>
                
                       
                  </table>
            
                </div>