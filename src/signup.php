<?php

   //Step1. Get database access
   require('../config/database.php');


   //Step2. Get form-date
   $f_name= trim($_POST['fname']);   //Los campos que van aqui en el corchete deben
   $l_name= trim($_POST['lname']); //ser iguales al alias que vienen del fronden
   $m_number=trim($_POST['mnumber']);
   $id_number=trim($_POST['idnumber']);
   $e_mail= strtolower(trim($_POST['email']));
   $p_wd=trim($_POST['passwd']);
   $url_photo = "photos/user_default.png";

   //$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
   $enc_pass = md5($p_wd);

   $check_email="
       select 
            u.email
       from
            users u
       where
          email= '$e_mail' or ide_number = '$id_number'
       LIMIT 1
   
   ";
   $res_check = pg_query($conn_local, $check_email);
   if(pg_num_rows($res_check)> 0){
      echo "<script>alert('User already exist !!')</script>";
    header('refresh:0;url=signup.html');
   }else{
         //Step3.Create query to INSERT INTO.
   $query ="INSERT INTO users (firstname, lastname, mobile_number, ide_number, email, password, url_photo)
   Values ('$f_name', '$l_name', '$m_number', '$id_number', '$e_mail', '$enc_pass', '$url_photo')";


   //Step4. Execute query

   $res = pg_query($conn_local, $query);

   //Step5. Validate result
   if($res){
      
    //echo "User has been created successfully !!! :D";
    echo "<script>alert('Success !!! Go to login')</script>";
    header('refresh:0;url=signin.html');
   }else{
    echo "Something wrong! :p";
   }
   }
?>