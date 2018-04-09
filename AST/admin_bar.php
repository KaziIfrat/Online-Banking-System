<?php session_start(); ?>
<?php
                
		include 'dbms.php';
		$sql="SELECT * FROM login WHERE login_id='$_SESSION[user_id]' and roll='0'";
		$result=  $conn->query($sql);
		$rws=  $result->fetch_assoc();
		$last_login= $rws['last_login'];
		?>
<div class="admin_bar"> 
    <ul>
    <li> <a href="admin_homepage.php">Home</a></li>
    <li> <a href="change_pw.php">Change password</a></li>
    <li> <a href="logout.php">Logout</a></li>
    
    </ul>
    <br>
    <br>
    <p><span class="lastlogin">Last Login: <?php echo $last_login;?></span></p>
</div>
