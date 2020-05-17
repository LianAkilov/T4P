<?php
require('db.php');
include("auth_session.php");
if(!isset($_POST['gameId'])) {
  echo "אירעה שגיאה";
} else {
  $gameId = $_POST['gameId'];
  $userIdQuery = "SELECT id From users WHERE username='".$_SESSION['username']."'";
  $res = $con->query($userIdQuery);
  $userId = 0;
  $i=0;
  if ($res->num_rows == 1) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
        $userId = $row['id'];
      }

  if ($res->num_rows == 1) {
      $query = "SELECT * From games WHERE id=".$gameId;
      $res = $con->query($query);
      if ($res->num_rows == 1) {
          // output data of each row
          while($row = $res->fetch_assoc()) {
            $split = explode(" ",$row['playerIds']);
              if(in_array($userId."",$split)) { 
                for($i=0;$i<count($split);$i++) {
                 if($split[$i]==$userId)
                 {
                    unset($split[$i]);
                    $split = array_values($split);
                 }
                }
                $playerIds_str = implode(" ",$split);
                $query = "UPDATE games SET playerIds='$playerIds_str' WHERE id=".$gameId;
                $result = $con->query($query);
                if($result) {
                  // מתקדם לחלק ה HTML של העמוד
                } else {
                  echo "אירעה שגיאה בשרת.";
                  ECHO "<a href=\"myGames.php\"> לחזרה לעמוד המשחקים שלי לחץ כאן </a>";
                }
              } else {
                echo "כבר יצאת ממשחק זה.";
                ECHO "<a href=\"myGames.php\"> לחזרה לעמוד המשחקים שלי לחץ כאן </a>";

              }
            } 
          }
       }
    } 
}
 ?>
 
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
     <strong>יצאת מהמשחק בהצלחה!</strong> <a href="myGames.php"> לחזרה לעמוד המשחקים שלי לחץ כאן </a>
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