<?php

   //Step1. Get database access
   require('../config/database.php');


   //Step2. Get form-date
   $user_id = Trim($_POST['userId']);
   $f_name= Trim($_POST['fname']);   
   $l_name= Trim($_POST['lname']); 

   //Step 3. Update query
   $sql_update_user = "
    update users set
    firstname = '$f_name',
    lastname = '$l_name'
    where
    id = '$user_id'
   ";
   $result = pg_query($conn_local, $sql_delete_user);
    if (!$result){
        die("Error: ".pg_last_error());
    }
     else{
            echo "<script>alert('User has been delete!')</script>";
            header('refresh:0;url=List_users.php');
    }
?>
