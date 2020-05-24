
<?php
    require('db.php');
    // When form submitted, insert values into the database.

        $password = md5(stripslashes($_POST['password']));
        $password = mysqli_real_escape_string($con, $password);
        $testUsername = $_POST['testUsername'];

        $query = "UPDATE `users` SET password='$password' WHERE `username` = '$testUsername'";
             
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: login.php");
        } else { // פותח HTML למטה // ?>

 <!-- ======= Header ======= -->

 <?php
include 'header.php';
include 'HeaderErrors.php';
?> 

 <!-- ======= HTML Section ======= -->
 
 <main id="main">
<section class="about contor-bg" >
<div class="container RformBox">
     <div class="row">
      <div class="col-lg-6 contor-bg">

      <div class="container">
     <div class="alert alert-success alert-dismissible fade in">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>אריאה שגיאה: <?php printf("Error message: %s\n", mysqli_error($con)); ?></strong> <a href="Profile.php"> חזרה לעמוד שכח סיסמא </a>
     </div>
     </div>

     </div>
 </div>
</div>
</section>
</main>
  
<!-- ======= Footer  ======= -->
    
<?php
include 'footer.php';
 }?>



