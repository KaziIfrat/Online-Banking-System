
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
                if(isset($_REQUEST['depo'])){
					echo '<script>alert("Deposited");';
					echo 'window.location= "deposit.php";</script>';
				}
                include 'dbms.php';
                $sql="SELECT * FROM accounts WHERE account_no='$_SESSION[user_id]'";
                $result=  $conn->query($sql);
                $rws=  $result->fetch_assoc();
				$balance= $rws['balance'];
				$conn->close();
				?>
            <div class='change_pw'>
            <form action="deposit.php" method="POST">
                <table align="center">
                    <tr>
                        <td>Current Balance:	</td><td><?php echo $balance;?></td>
                    </tr>
                    <tr>
                        <td>Deposit amount:	</td>
                        <td><input type="text" name="withdraw" required=""/></td>
                    </tr>
                    <tr>
                        <td>Password:	</td>
                        <td><input type="password" name="password" required=""/></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="deposit" value="Deposit" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
            
            <?php 
			
			include 'dbms.php';
			
			if(isset($_POST['deposit']))
			{
				$password= $_POST['password'];
                $sql2="select * from login where login_id = '$_SESSION[user_id]' and passwrd = '$password' and roll = $_SESSION[role]";
                
				$result=$conn->query($sql2);

                   if(!$row=$result->fetch_assoc() ){
				   echo "Wrong password";
				   }
				    else{
					$balance= $_POST['withdraw'];
					$sql1="UPDATE `accounts` SET balance= balance+$balance WHERE account_no= $_SESSION[user_id]";
					$conn->query($sql1);
					header("location: deposit.php?depo=1");
				}
				
			
			}
				
				
			?>
            
               </div>