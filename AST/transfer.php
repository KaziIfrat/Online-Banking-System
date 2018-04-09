
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transfer</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
    <?php include 'header.php'?>
           <?php include 'customer_bar.php'?>
           <?php
                if(isset($_REQUEST['with'])){
					echo '<script>alert("Transfered successfully!");';
					echo 'window.location= "transfer.php";</script>';
				}
                include 'dbms.php';
                $sql="SELECT * FROM accounts WHERE account_no='$_SESSION[user_id]'";
                $result=  $conn->query($sql);
                $rws=  $result->fetch_assoc();
				$balance= $rws['balance'];
				//$conn->close();
				?>
            <div class='transfer'>
            <form action="transfer.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Current Balance:	</td><td><?php echo $balance;?></td>
                    </tr>
                    <tr>
                        <td>Receiver ID:	</td>
                        <td><input type="text" name="rec_id" required=""/></td>
                    </tr>
                    <tr>
                        <td>transfer amount:	</td>
                        <td><input type="text" name="ter_am" required=""/></td>
                    </tr>
                    <tr>
                        <td>Password:	</td>
                        <td><input type="password" name="password" required=""/></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="deposit" value="Transfer" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
            
            <?php 
			
			include 'dbms.php';
			
			if(isset($_POST['deposit']))
			{
				
				$password= $_POST['password'];
				
				$recid=$_POST['rec_id'];
				$tram=$_POST['ter_am'];
                $sql2="select * from login where login_id = '$_SESSION[user_id]' and passwrd = '$password' and roll = '1'";
				$sql3="select * from login where login_id = '$recid' and roll = '1'";
                
				$result=mysqli_query($conn,$sql2);
				$result1=mysqli_query($conn,$sql3);
					
                   if(!$row=mysqli_fetch_assoc($result) ){
				   echo "Wrong password";
				   }
				   else if(!$row1=mysqli_fetch_assoc($result1) )
				   {
				   echo "Invalid User ID";
				   }
				   else if($tram>$balance){
					   echo "You do not have sufficient balance";
				   }
				   else if($balance-$tram<=1000){
					   echo "You do not have sufficient balance";
				   }
				    else{
					
					echo "done";
						$sql1="UPDATE `accounts` SET balance= balance+$tram WHERE account_no= '$recid'";
						$conn->query($sql1);
						$sql1="UPDATE `accounts` SET balance= balance-$tram WHERE account_no= '$_SESSION[user_id]'";
						$conn->query($sql1);
						$sql4="INSERT INTO `transactions`(`transaction_id`, `received_id`, `transfer`, `receive`) VALUES ('$_SESSION[user_id]','$recid','$tram','$tram')";
						$result=mysqli_query($conn,$sql4);
						header("location: transfer.php?with=1");
				}
				
			
			}
				
				
			?>
            
               </div>