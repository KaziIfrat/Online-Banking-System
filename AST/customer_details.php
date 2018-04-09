
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>
        
        <link rel="stylesheet" href="myStyle.css">
    </head>
    <?php include 'header.php'?>
        <?php include 'customer_bar.php'?>
 	      <?php
                include 'dbms.php';
                $sql="SELECT * FROM customer_details WHERE id='$_SESSION[user_id]'";
                $result=  $conn->query($sql);
                $rws=  $result->fetch_assoc();
               
                $name= $rws['name'];
                $account_no= $rws['id'];
                $dob=$rws['DOB'];
                $nominee=$rws['nominee'];
                $gender=$rws['gender'];
                $mobile=$rws['phone_no'];
                $email=$rws['email'];
                $address=$rws['address'];
				?> 
        <div class="text">Welcome<?php echo " $name"?></div>
        <div class="customer_body">
            <p><span class="heading">Name: </span><?php echo $name;?></p>
            <p><span class="heading">Account No: </span><?php echo $account_no;?></p>
            <p><span class="heading">Gender: </span><?php if($gender=='M') echo "Male"; else echo "Female";?></p>
            <p><span class="heading">Mobile: </span><?php echo $mobile;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Address: </span><?php echo $address;?></p>
            <p><span class="heading">Date of Birth: </span><?php echo $dob;?></p>
            <p><span class="heading">Nominee: </span><?php echo $nominee;?></p>
            
        </div>
</html>