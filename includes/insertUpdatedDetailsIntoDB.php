
<?php
    require('db.php');
    include("auth_session.php");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        if($_POST['username'] == null){
            $strSQL = "SELECT username FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $username = $row['username'];
            }
        }
        else{
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($con, $username);
        }

        if($_POST['email'] == null){
            $strSQL = "SELECT email FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $email = $row['email'];
            }
        }
        else{
            $email = stripslashes($_POST['email']);
            $email = mysqli_real_escape_string($con, $email);
        }

        if($_POST['password'] == null){
            $strSQL = "SELECT password FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $password = $row['password'];
            }
        }
        else{
            $password = md5(stripslashes($_POST['password']));
            $password = mysqli_real_escape_string($con, $password);
        }

        if($_POST['fullName'] == null){
            $strSQL = "SELECT fullName FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $fullName = $row['fullName'];
            }
        }
        else{
            $fullName = stripslashes($_POST['fullName']);
            $fullName = mysqli_real_escape_string($con, $fullName);
        }

        if($_POST['age'] == null){
            $strSQL = "SELECT age FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $age = $row['age'];
            }
        }
        else{
            $age = stripslashes($_POST['age']);
            $age = mysqli_real_escape_string($con, $age);
        }

        if($_POST['phoneNumber'] == null){
            $strSQL = "SELECT phoneNumber FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $phoneNumber = $row['phoneNumber'];
            }
        }
        else{
            $phoneNumber = stripslashes($_POST['phoneNumber']);
            $phoneNumber = mysqli_real_escape_string($con, $phoneNumber);
        }

        if($_POST['gender'] == null){
            $strSQL = "SELECT gender FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $gender = $row['gender'];
            }
        }
        else{
            $gender = stripslashes($_POST['gender']);
            $gender = mysqli_real_escape_string($con, $gender);
        }

        if($_POST['level'] == null){
            $strSQL = "SELECT level FROM users WHERE username = '".$_SESSION['username']."'";
            $rs = mysqli_query($con, $strSQL);
            while($row = mysqli_fetch_array($rs)) {
                $level = $row['level'];
            }
        }
        else{
            $level = stripslashes($_POST['level']);
            $level = mysqli_real_escape_string($con, $level);
        }


        $query = "UPDATE `users` SET username='$username', password='$password', email='$email', fullName='$fullName', age='$age', phoneNumber='$phoneNumber', gender='$gender', level='$level' WHERE `username` = '".$_SESSION['username']."'";
             
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: Profile.php");
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
     <strong>אריאה שגיאה: <?php printf("Error message: %s\n", mysqli_error($con)); ?></strong> <a href="Profile.php"> לחזרה לעמוד הפרופיל שלי לחץ כאן </a>
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
    } else {}
?>



