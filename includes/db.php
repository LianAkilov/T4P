<?php

   // $con = mysqli_connect("localhost","root","","phpmyadmin"); //
      $con = mysqli_connect("localhost","root","","orrh_phpmyadmin");
     
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    mysqli_set_charset($con,"utf8mb4");

?>
