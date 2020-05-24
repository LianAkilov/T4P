<?php
//include auth_session.php file on all user panel pages
require('db.php');
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
     <strong>שם המשתמש, כתובת המייל או תעודת הזהות כבר קיימים במערכת!</strong> <a href="Registration.php"> לחץ כאן לחזרה לעמוד ההרשמה </a>
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
