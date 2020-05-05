<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");

?>

<?php

include 'header.php';

?>
     
 <main id="main">


<section class="about contor-bg" >
  <div class="container">
  <h1 class= "BigCoteret" >פרופיל אישי</h1>
      <div class="row">
         <div class="col-lg-6 pt-4 pt-lg-0 ">
           <img src="../assets/img/you.jpg" alt="John" style="width:70%">
           <div class="overlay containerProfileImg">
          <!-- <div class="textOnImg">בחר תמונה</div> -->
           </div>
         </div>

		     <div class="col-lg-6 about contor-bg">
          <div class="carousel-item active"> 
          <div class="carousel-container">
             </br>
                <p class= "ProfileBox"><span style="font-weight:bold"> שם מלא: </span>
                  <?php 
                    $strSQL = "SELECT fullName FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo $row['fullName'];
                    }
                  ?> </p>
                <p class= "ProfileBox"><span style="font-weight:bold"> שם משתמש: </span>
                  <?php 
                    $strSQL = "SELECT username FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo $row['username'];
                    }
                  ?> </p>

                <p class= "ProfileBox"><span style="font-weight:bold"> סיסמא: ******** </span>

                <p class= "ProfileBox"><span style="font-weight:bold">  מייל: </span>
                  <?php 
                    $strSQL = "SELECT email FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo $row['email'];
                    }
                  ?> </p>
                <p class= "ProfileBox"><span style="font-weight:bold"> גיל: </span>
                  <?php 
                    $strSQL = "SELECT age FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo $row['age'];
                    }
                  ?> </p>

                 <p class= "ProfileBox"><span style="font-weight:bold"> מספר טלפון: </span>
                  <?php 
                    $strSQL = "SELECT phoneNumber FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo '0'. $row['phoneNumber'];
                    }
                  ?> </p>

                 <p class= "ProfileBox"><span style="font-weight:bold"> מין: </span>
                  <?php 
                    $strSQL = "SELECT gender FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo $row['gender'];
                    }
                  ?> </p>

                 <p class= "ProfileBox"><span style="font-weight:bold"> רמת משחק: </span>
                  <?php 
                    $strSQL = "SELECT level FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    echo $row['level'];
                    }
                  ?> </p>
                
                <p><button class="btn btn-primary" >עדכון פרטים</button></p>
        </div>
      </div>	
    </div>
   </div>
  </div>
  </section><!-- End About Section -->
</main>
    
    
<?php

include 'footer.php';

?>