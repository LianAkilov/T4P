<?php
require('db.php');
include("auth_session.php");
$numberOfPlayers = $_POST['numOfPlayers'];
$time = $_POST['time'];
$date = $_POST['date'];
$courtId = $_POST['courtId'];
$level = $_POST['level'];
$userIdQuery = "SELECT id From users WHERE username='".$_SESSION['username']."'";
$res = $con->query($userIdQuery);
$userId = 0;
if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
      $userId = $row['id'];
    }
} else {
  echo "אירעה שגיאה, נסה שוב בעוד כמה דקות.";
}
$query = "SELECT * From games WHERE courtId=".$courtId ." AND gameDate='".$date."' AND gameTime='".$time."'";
$result = $con->query($query);
if ($result->num_rows > 0) {
    echo "המגרש נתפס כבר בתאריך והשעה הרצויים";
} else {
  $query    = "INSERT into `games` (courtId, captainId, numberOfPlayers, gameDate, gameTime, playerIds, level)
               VALUES ('$courtId','$userId','$numberOfPlayers','$date','$time','$userId','$level')";
  $result = $con->query($query);

  if($result == true) {
    echo "יצרת משחק חדש בתאריך " . $date . " בשעה " . $time . " עם " . $numberOfPlayers . " משתתפים.";
    echo " רמת המשחק: " . $level;
  } else {
    echo "אירעה שגיאה, נסה שוב בעוד כמה דקות.";
  }
}

 ?>
