
<?php
require('db.php');
include("auth_session.php");

function checkDateValid($date) {
  $todayDate = date("Y-m-d", strtotime("now"));
  $today = explode("-",$todayDate);
  $picked = explode("-",$date);
  $todayYear = (int)$today[0];
  $dateYear = (int)$picked[0];
  if($todayYear > $dateYear) {
    return false;
  }
  $todayMonth = (int)$today[1];
  $dateMonth = (int)$picked[1];
  if(($todayYear == $dateYear) && ($todayMonth > $dateMonth)) {
    return false;
  }
  $todayDay = (int)$today[2];
  $dateDay = (int)$picked[2];
  if(($todayYear == $dateYear) && ($todayMonth == $dateMonth) && ($todayDay > $dateDay)) {
    return false;
  }
  return true;
}

if(!isset($_POST['courtName']) || !isset($_POST['date'])) {
  header("Location: ../index.php");
} else {
  $courtName = $_POST['courtName'];
  $date = $_POST['date'];
  if(!checkDateValid($date)) {
      header("Location: dateError.php");
  }
  $query_courts = "SELECT * FROM courts WHERE beachName = '" . $courtName . "'";
  $courts   = $con->query($query_courts);
  $courtsArr = [];
  if ($courts->num_rows > 0) {
      // output data of each row
      while($row = $courts->fetch_assoc()) {
          array_push($courtsArr,$row);
      }
  }
}

 ?>
 <?php

 include 'header.php';

 ?>

  <!-- ======= HTML Section ======= -->

  <link href="../assets/css/test1.css" rel="stylesheet">

 <main id="main">
 <section class="about contor-bg" >
 <div class="container RformBox">
      <div class="row">
       <div class="col-lg-12 contor-bg">

       <h3 class="title"> בחר מגרש מרשימת המגרשים בחוף "<?php echo $courtName ?>"</h3>
       <br>
       <form class="" action="openGameChooseTime.php" method="post">
          <input type="hidden" name="date" value="<?php echo $date ?>">
          <?php
          foreach($courtsArr as $court) {
              $name = "שם המגרש: ". $court['courtName'];
              $type="סוג קרקע: " . $court['groundType'];
              $start="שעת פתיחה: ". $court['openHour'];
              $end="שעת סגירה: ". $court['closeHour'];
              $lights="";
              $net="";
            ?>
            
            <label id="testCourt">
            <input type="radio" name="court" value="<?php echo $court['id'] ?>">
            <img src="../assets/img/court.jpg" alt="1" id="testPhoto">
            <div class="testDetails">
              <p><?php echo $name ?></p>
              <p><?php echo $type ?></p>
              <p><?php echo $start ?></p>
            <?php  if($court['lights']==1) { ?>
              <p> תאורה: <img src="../assets/img/YES.png" alt="1" id="testLogo"></p>
             <?php } else { ?>
              <p> תאורה: <img src="../assets/img/NO.png" alt="1" id="testLogo"></p>
             <?php  }?>
             <?php  if($court['net']==1) { ?>
              <p> רשת: <img src="../assets/img/YES.png" alt="1" id="testLogo"></p>
             <?php } else { ?>
              <p> רשת: <img src="../assets/img/NO.png" alt="1" id="testLogo"></p>
             <?php  }?>
            
            </div>
            </label>

            <?php
            }
            ?>

          <button type="submit" class="button" name="submit">המשך</button>
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
