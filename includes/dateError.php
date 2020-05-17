<?php
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
     <strong>התאריך שבחרת עבר, אנא בחר תארין תקין!</strong> <a href="openGame.php"> לחץ כאן לחזור </a>
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
