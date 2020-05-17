
<?php
require('db.php');
include("auth_session.php");

if(!isset($_POST['gameId'])) {
    echo "אירעה שגיאה, האיידי של המשחק לא הועבר כראוי"; 

} else {
$gameId = $_POST['gameId'];

// sql to delete a record
$sql = "DELETE FROM `games` WHERE `id`='$gameId'";

if ($con->query($sql) === TRUE) { // במידה והמשחק נמחק בהצלחה//?>

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
     <strong>המשחק נמחק בהצלחה!</strong> <a href="myGames.php"> לחזרה לעמוד המשחקים שלי לחץ כאן </a>
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
    
         
<?php } else { // במידה והמשחק לא נמחק בהצלחה // ?>
     
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
     <strong>איראה שגיאה: <?php $con->error; ?></strong> <a href="myGames.php"> לחזרה לעמוד המשחקים שלי לחץ כאן </a>
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

<?php }

mysqli_close($con);

} ?>



