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
  if ($res->num_rows == 1) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
        $userId = $row['id'];
      }
      $query = "SELECT * From games WHERE id=".$gameId;
      $res = $con->query($query);
      if ($res->num_rows == 1) {
          // output data of each row
          while($row = $res->fetch_assoc()) {
            $split = explode(" ",$row['playerIds']);
            $numOfNulls=0;
            for($i=0;$i<count($split);$i++){
              if($split[$i]==null){
                $numOfNulls++;
              }
            }
            $currentNumOfPlayers = count($split) - $numOfNulls;
            if($currentNumOfPlayers < $row['numberOfPlayers']) {
              if(!in_array($userId."",$split)) { 
                $playerIds = $row['playerIds'] . " " . $userId;
                $query = "UPDATE games SET playerIds='$playerIds' WHERE id=".$gameId;
                $result = $con->query($query);
                if($result) {
                  echo "התווספת למשחק בהצלחה!";
                } else {
                  echo "אירעה שגיאה בשרת.";
                }
              } else {
                echo "כבר נרשמת למשחק זה.";
                
              }
            } else {
              echo "המשחק כבר מלא ב". $row['numberOfPlayers'] . " שחקנים";
            }
          }

      } else {
        echo "המשחק כבר לא קיים";
      }
  } else {
    echo "אירעה שגיאה";
  }
}
 ?>
