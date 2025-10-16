<?php 
//Step 1. Get database connection
require('../config/database.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - List users</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
       
            <th>Fullname</th>
            <th>E-mail</th>
            <th>Phoner number</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        <?php
        sql_users = "
        //
       
        ";
        ?>
        <tr>
            <td>Paola Salazar</td>
            <td>paolabb@gmail.com</td>
            <td>31232234221</td>
            <td>Active</td>
        <td>
        <a href="#"><img src="icons/" width="20"></a>
        <a href="#"><img src="icons/update.png" width="20"></a>
        <a href="#"><img src="icons/delete.png" width="20"></a>
        </td>
      </tr>  
   </table>
</body>
</html>