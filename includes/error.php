<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
?>

 <!-- ======= Header  ======= -->

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
     <strong>אירעה שגיאה!</strong> <a href="../index.php"> לחץ כאן לחזרה לעמוד הבית </a>
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

?>
