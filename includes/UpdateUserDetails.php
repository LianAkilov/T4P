<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
?>

 <!-- ======= Header ======= -->

<?php

include 'header.php';

?>

 <!-- ======= HTML Section ======= -->
     
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
             <form class="form-grpop" action="insertUpdatedDetailsIntoDB.php" method="post">
                <p class= "ProfileBox"><span style="font-weight:bold"> שם מלא: </span> 
                  <?php 
                    $strSQL = "SELECT fullName FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    $fullName = $row['fullName'];
                     }
                  ?> 
                <label for="fullName"></label>
                <input type="text" name="fullName" placeholder="<?php echo $fullName ?>">  
                </p>
                <p class= "ProfileBox"><span style="font-weight:bold"> שם משתמש: </span>
                  <?php 
                    $strSQL = "SELECT username FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    $username = $row['username'];
                    }
                  ?> 
                 <label for="username"></label>
                <input type="text" name="username" placeholder="<?php echo $username ?>">  
                </p>

                <p class= "ProfileBox"><span style="font-weight:bold"> סיסמא: </span>
                <label for="password"></label>
                <input type="password" name="password" placeholder="********"> </p>

                <p class= "ProfileBox"><span style="font-weight:bold">  מייל: </span>
                  <?php 
                    $strSQL = "SELECT email FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    $email = $row['email'];
                    }
                  ?> 
                <label for="email"></label>
                <input type="text" name="email" placeholder="<?php echo $email ?>">   
                </p>
                <p class= "ProfileBox"><span style="font-weight:bold"> גיל: </span>
                  <?php 
                    $strSQL = "SELECT age FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    $age = $row['age'];
                    }
                  ?>
                <label for="age"></label>
                <input type="number" style="display: block" name="age" placeholder="<?php echo $age ?>">  
                </p>

                 <p class= "ProfileBox"><span style="font-weight:bold"> מספר טלפון: </span>
                  <?php 
                    $strSQL = "SELECT phoneNumber FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    // echo '0'. $row['phoneNumber']; //
                    $phoneNumber = $row['phoneNumber'];
                    }
                  ?>
                 <label for="phoneNumber"></label>
                <input type="number" style="display: block" name="phoneNumber" placeholder="<?php echo '0'. $phoneNumber ?>"> 
                </p>

                 <p class= "ProfileBox"><span style="font-weight:bold"> מין: </span>
                  <?php 
                    $strSQL = "SELECT gender FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    $gender = $row['gender'];
                    }
                    if($gender=="גבר") {?>
                      <label for="exampleFormControlSelect1"></label>
                      <select class="form-control" name="gender" id="exampleFormControlSelect1">
                      <option selected value="גבר">גבר</option>
                      <option value="אישה">אישה</option>
                      </select>  
                    <?php } else { ?>
                      <label for="exampleFormControlSelect1"></label>
                      <select class="form-control" name="gender" id="exampleFormControlSelect1">
                      <option value="גבר">גבר</option>
                      <option selected value="אישה">אישה</option>
                      </select>                       
                    <?php } ?>
                 </p>

                 <p class= "ProfileBox"><span style="font-weight:bold"> רמת משחק: </span>
                  <?php 
                    $strSQL = "SELECT level FROM users WHERE username = '".$_SESSION['username']."'";
                    $rs = mysqli_query($con, $strSQL);
                    while($row = mysqli_fetch_array($rs)) {
                    $level = $row['level'];
                    }
                    if($level=="חובבן") { ?>
                 
                     <label for="exampleFormControlSelect1"> </label>
                      <select class="form-control" name="level" id="exampleFormControlSelect1">
                      <option selected value="חובבן">חובבן</option>
                      <option value="בינוני">בינוני</option>
                      <option value="מקצוען">מקצוען</option>
                      </select> 
                 <?php } if($level=="בינוני") { ?>
                  
                       <label for="exampleFormControlSelect1"> </label>
                      <select class="form-control" name="level" id="exampleFormControlSelect1">
                      <option value="חובבן">חובבן</option>
                      <option selected value="בינוני">בינוני</option>
                      <option value="מקצוען">מקצוען</option>
                      </select>   
                  <?php } if($level=="מקצוען") {?>
                  <label for="exampleFormControlSelect1"> </label>
                      <select class="form-control" name="level" id="exampleFormControlSelect1">
                      <option value="חובבן">חובבן</option>
                      <option value="בינוני">בינוני</option>
                      <option selected value="מקצוען">מקצוען</option>
                      </select> 
                      <?php } ?>

                </p></br>
                
                <p><button type="submit" class="btn btn-primary" >שמור שינויים </button></p>
                </form>
        </div>
      </div>	
    </div>
   </div>
  </div>
  </section><!-- End About Section -->
</main>
    
 <!-- ======= Footer ======= -->
    
<?php

include 'footer.php';

?>