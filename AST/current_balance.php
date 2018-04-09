
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bank Statement</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
    <?php include 'header.php'?>
        <?php include 'customer_bar.php'?>
    <?php
                
                include 'dbms.php';
                $sql="SELECT * FROM accounts WHERE account_no='$_SESSION[user_id]'";
                $result=  $conn->query($sql);
                $rws=  $result->fetch_assoc();
				$balance= $rws['balance'];
				$id= $rws['account_no'];
				$conn->close();
				?>
        <div class="customer_body">
     
            <p><span class="heading">Account No: <?php echo $id;?></span></p>
            <p><span class="heading">Your current balance is <?php echo $balance;?></span></p>
            
           
        </div>
</html>