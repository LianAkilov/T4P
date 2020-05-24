<?php
//include auth_session.php file on all user panel pages
require('db.php');

$testUsername=$_POST['username'];
$testEmail=$_POST['email'];
$testIdentificationNumber =$_POST['identificationNumber'];

$userQuery= "SELECT username FROM users WHERE username='$testUsername' AND email='$testEmail' AND identificationNumber='$testIdentificationNumber'";

$res = $con->query($userQuery);

if ($res->num_rows != 1) {
// output data of each row
   header('Location: testUserError.php');
}

else{

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
        <form class="form-grpop" action="UpdateUserPassword.php" method="post">
        <input type="hidden" name="testUsername" value="<?php echo $testUsername ?>">

          <p class= "ProfileBox"><span style="font-weight:bold"> הכנס סיסמא חדשה: </span>
          <label for="password"></label>
          <input type="password" name="password" placeholder="********"> </p>
          <button type="submit" class="btn btn-lg btn-primary btn-block">עדכן סיסמא</button>
        </form>
        </div>

     </div>
 </div>
</div>
</section>
   
</main>
  
<!-- ======= Footer  ======= -->
  
<?php

include 'footer.php';

} ?> 