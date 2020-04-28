
<?php
require('db.php');
include("auth_session.php");

if(!isset($_POST['court']) || !isset($_POST['date'])) {
  header("Location: ../index.php");
} else {
  $amateur="חובבן";
  $mid = "בינוני";
  $pro = "מקצוען";
  $court_id = $_POST['court'];
  $date = $_POST['date'];
  $query_courts = "SELECT * FROM courts WHERE id = " . $court_id;
  $courts   = $con->query($query_courts);
  $court = [];
  if ($courts->num_rows == 1) {
      // output data of each row
      while($row = $courts->fetch_assoc()) {
          $court = $row;
      }
  }
  $query_games = "SELECT * FROM games WHERE gameDate = '" . $date . "' AND courtId = " . $court_id;
  $games = $con->query($query_games);
  $games_by_date = [];
  if ($games->num_rows > 0) {
      // output data of each row
      while($row = $games->fetch_assoc()) {
          array_push($games_by_date, $row['gameTime']);
          $splited = explode(":",$row['gameTime']);
          $gameHour = (int) $splited[0];
          $gameHour = $gameHour + 1;
          $hourMore = $gameHour . ":" . $splited[1];
          if($gameHour < 10) {
            $hourMore = "0".$hourMore;
          }
          $gameHour = $gameHour - 2;
          $hourLess = $gameHour . ":" . $splited[1];
          if($gameHour < 10) {
            $hourLess = "0".$hourLess;
          }
          array_push($games_by_date, $hourMore);
          array_push($games_by_date, $hourLess);
      }
  }

  $times = [];
  $open = explode(":",$court['openHour']);
  $openHour = (int)$open[0];
  $openMinutes = (int)$open[1];
  $close = explode(":",$court['closeHour']);
  $closeHour = (int)$close[0];
  $closeMinutes = (int)$close[1];
  $hour="";
  $minutes="";
  while($closeHour > $openHour) {
    if($openMinutes < 10) {
      $minutes = "0".$openMinutes;
    } else {
      $minutes = $openMinutes;
    }
    if($openHour < 10) {
      $hour = "0".$openHour;
    } else {
      $hour = $openHour;
    }
    $time = $hour . ":" . $minutes;
    $openHour = $openHour + 1;
    if(!in_array($time, $games_by_date)) {
      array_push($times,$time);
    }
  }
  if($closeHour == $openHour && ($openMinutes + 30) <= $closeMinutes) {
      if($openMinutes < 10) {
        $minutes = "0".$openMinutes;
      } else {
        $minutes = $openMinutes;
      }
      if($openHour < 10) {
        $hour = "0".$openHour;
      } else {
        $hour = $openHour;
      }
      $time = $hour . ":" . $minutes;
      if(!in_array($time, $games_by_date)) {
        array_push($times,$time);
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
       <div class="center">

       <h1> בחר שעה רצויה, מספר שחקנים ורמת משחק </h1>
       <h6>לתשומת ליבכם , המגרש יעמוד עבורכם לשעתיים מהזמן שבחרתם או עד שעת הסגירה של המגרש</h6>
       <br>

       <div id="flip"> <img src="https://media.giphy.com/media/cluiWeXsDpg5uEtyrG/giphy.gif" class="rotateimg180" id="ClickHere"> פרטי המשחק <img src="https://media.giphy.com/media/cluiWeXsDpg5uEtyrG/giphy.gif" id="ClickHere"></div>
       <div id="panel">
       <h3>חוף "<?php echo $court['beachName'] ?>"</h3>
       <h3><?php echo $court['city'] ?> - רחוב <?php echo $court['streetName'] . " ". $court['streetNumber'] ?></h3>
       <h4>שעות הפעילות של המגרש הן <?php echo $court['openHour'] ?> עד <?php echo $court['closeHour'] ?></h4>
	    </div>

       
       <div class="container">
       <form class="" action="javascript:insertGameToDB()" method="post">
          <input type="hidden" name="date" value="<?php echo $date ?>">
          <input type="hidden" name="courtId" value="<?php echo $court_id ?>">

          <h6>כמות משתתפים</h6>
          <select class="custom-select" name="numOfPlayers">
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="12">12</option>
          </select>
          <h6>שעה רצויה למשחק</h6>
          <select class="custom-select" name="time">
            <?php
            foreach($times as $time){
            ?>
            <option value="<?php echo $time ?>"><?php echo $time?></option>
            <?php
            }
            ?>
          </select>
          <h6>רמת משחק</h6>

          <select class="custom-select" name="level">
            <option value="<?php echo $amateur ?>"><?php echo $amateur ?></option>
            <option value="<?php echo $mid ?>"><?php echo $mid ?></option>
            <option value="<?php echo $pro ?>"><?php echo $pro ?></option>

          </select>
          <button type="submit" name="submit">הוסף משחק</button>
       </form>
       </div>

      </div>
  </div>
  </div>
 </div>
 </section>

 </main>

 <script type="text/javascript">
   function insertGameToDB() {
     var level = document.getElementsByName("level")[0].value;
     var courtId = document.getElementsByName("courtId")[0].value;
     var date = document.getElementsByName("date")[0].value;
     var time = document.getElementsByName("time")[0].value;
     var numOfPlayers = document.getElementsByName("numOfPlayers")[0].value;
     alertify.confirm('','האם ליצור משחק בתאריך ' + date + ' בשעה ' + time + '?',
      function(){
        var init_xhttp = new XMLHttpRequest();
        init_xhttp.onreadystatechange = function() {
          if (init_xhttp.readyState == XMLHttpRequest.DONE) {
              // alertify.alert('Mobile Group',init_xhttp.responseText);
              alertify.alert('',init_xhttp.responseText);
              setTimeout(() => {              window.location.href = "../index.php";}, 5500);
          }
        }
        init_xhttp.open("POST", "insertGameToDB.php", true);
        init_xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        init_xhttp.send('courtId=' + courtId+"&date="+date+"&time="+time+"&numOfPlayers="+numOfPlayers+"&level="+level);
      },
      function(){
      });



   }
 </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle(2000);
  });
});

</script>

 <!-- ======= Footer  ======= -->


 <?php

 include 'footer.php';

 ?>
