<?php
//include auth_session.php file on all user panel pages
require('db.php');
?>

   <!-- ======= Header  ======= -->

<?php

include 'header.php';

?>

 <!-- ======= HTML Section ======= -->
 
 <main id="main">

<section class="about contor-bg" >
<div class="container RformBox">
     <div class="row">
      <div class="col-lg-12 contor-bg">

      <div class="container">
      <h1 class= "BigCoteret" >מלא את הפרטים הבאים</h1>
     </div>

      <form action="testUserDetails.php" method="POST">
        <div class="container">
        <label for="username"><b>שם משתמש</b></label>
        <input type="text" placeholder="הכנס שם משתמש" name="username" required>

        <label for="email"><b>כתובת מייל</b></label>
        <input type="email" placeholder="הכנס מייל" name="email" required>

        <label for="identificationNumber"><b> תעודת זהות</b></label></br>
        <input type="number" class="form-control" placeholder="הכנס תעודת זהות" name="identificationNumber" required></br>
        
		<button type="submit" class="btn btn-lg btn-primary btn-block">בדוק</button>

        </div>
      </form>

     </div>
 </div>
</div>
</section>
   
</main>
  
<!-- ======= Footer  ======= -->
  
<?php

include 'footer.php';

?>