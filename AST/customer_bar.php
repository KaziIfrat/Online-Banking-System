<?php session_start(); ?>
<?php
                
		include 'dbms.php';
		$sql="SELECT * FROM login WHERE login_id='$_SESSION[user_id]' and roll='1'";
		$result=  $conn->query($sql);
		$rws=  $result->fetch_assoc();
		$last_login= $rws['last_login'];
		$conn->close();
		?>
<div class="customer_bar">
             <ul>
                <li><a href="customer_homepage.php">Home</a></li>
                <li><a href="customer_details.php">Personal Details</a></li>
                <li><a href="change_pwc.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li> 
             </ul>
             <p><span class="lastlogin">Last Login: <?php echo $last_login;?></span></p>
        </div>