<?php

//Step 1. Get database connection
require('../config/database.php');

 //Step 2. Get data or params
 $user_id = $_GET['userId'];

 $sql_get_user = "select * from users where id = $user_id";
 $result = pg_query($conn_local, $sql_get_user);

 if (!$result){
    die("Error: ". pg_last_error());
 }

 while ($row = pg_fetch_assoc($result)){
    $id_number = $row['ide_number'];
    $f_name = $row['firstname'];
    $l_name = $row['lastname'];
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USERS</title>
    
</head>
<body align= "center">
    <form name="edit user-form" action = "update_user.php" method = "post">
        <label> User</label>
        <input type="hidden" name= "id_number" value="<?php echo $user_id ?>"readonly required/><br><br>
        <label> Id_number: </label>
        <input type="text" name= "id_number" value="<?php echo $id_number ?>"readonly required/><br><br>
        <label> Firstname: </label>
        <input type="text" name= "fname" value="<?php echo $f_name ?>" required/><br><br>
        <label> Lastname: </label>
        <input type="text" name= "lname" value="<?php echo $l_name ?>" required/><br><br>    
        <button type="sumbit"> Update user </button>
  </form>
</body>
</html>