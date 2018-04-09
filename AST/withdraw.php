
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deposit</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
    <?php include 'header.php'?>
           <?php include 'customer_bar.php'?>
           <?php
                if(isset($_REQUEST['with'])){
					echo '<script>alert("Withdrawn");';
					echo 'window.location= "withdraw.php";</script>';
				}
                include 'dbms.php';
                $sql="SELECT * FROM accounts WHERE account_no='$_SESSION[user_id]'";
                $result=  $conn->query($sql);
                $rws=  $result->fetch_assoc();
				$balance= $rws['balance'];
				$conn->close();
				?>
            <div class='change_pw'>
            <form action="withdraw.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Current Balance:	</td><td><?php echo $balance;?></td>
                    </tr>
                    <tr>
                        <td>Withdraw amount:	</td>
                        <td><input type="text" name="withdraw" required=""/></td>
                    </tr>
                    <tr>
                        <td>Password:	</td>
                        <td><input type="password" name="password" required=""/></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="deposit" value="Withdraw" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
            
            <?php 
			
			include 'dbms.php';
			
			if(isset($_POST['deposit']))
			{
				
				$password= $_POST['password'];
                $sql2="select * from login where login_id = '$_SESSION[user_id]' and passwrd = '$password' and roll = $_SESSION[role]";
                
				$result=mysqli_query($conn,$sql2);
					$balance1= $_POST['withdraw'];
                   if(!$row=mysqli_fetch_assoc($result) ){
				   echo "Wrong password";
				   }
				   else if($balance1>$balance){
					   echo "You do not have sufficient balance";
				   }
				   else if($balance-$balance1<=1000){
					   echo "You do not have sufficient balance";
				   }
				    else{
					
						echo 
						$sql1="UPDATE `accounts` SET balance= balance-$balance1 WHERE account_no= $_SESSION[user_id]";
						$conn->query($sql1);
						header("location: withdraw.php?with=1");
				}
				
			
			}
				
				
			?>
            
               </div>