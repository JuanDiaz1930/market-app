<?php
    //Start or continue with session
    session_start();


    //Destroy current session
    session_destroy();


    //Redrect to login form
    header('refresh:0;url=signin.html'); 
       

?>