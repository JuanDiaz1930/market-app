<?php

   //Step1. Get database access
   require('../config/database.php');


   //Step2. Get form-date
   $f_name= $_POST['fname'];   //Los campos que van aqui en el corchete deben
   $l_name= $_POST['lname']; //ser iguales al alias que vienen del fronden
   $m_number=$_POST['mnumber'];
   $id_number=$_POST['idnumber'];
   $e_mail=$_POST['email'];
   $p_wd=$_POST['passwd'];

   $enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);


   //Step3.Create query to INSERT INTO.
   $query ="INSERT INTO users (firstname, lastname, mobile_number, ide_number, email, password)
   Values ('$f_name', '$l_name', '$m_number', '$id_number', '$e_mail', '$enc_pass')";


   //Step4. Execute query

   $res = pg_query($conn, $query);

   //Step5. Validate result
   if($res){
    echo "User has been created successfully !!! :D";
   }else{
    echo "Something wrong! :p";
   }
?>