<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Homepage</title>
        
        <link rel="stylesheet" href="myStyle.css">
        <?php include 'header.php'?>
    </head>
    
    
    <body>
    		<?php include 'admin_bar.php'?>
           
            <div class="admin_home">
            <ul>
            <li><a href="add_customer.php">Add Customer</a></li>
            <li> <a href="edit.php">Edit customer</a></li>
            <li> <a href="delete_customer.php">Delete customer</a></li>
            <li> <a href="searchs.php">Search customer</a></li>
            </ul>
            </div>
    </body>
</html>
