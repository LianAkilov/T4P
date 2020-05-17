<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
$amateur="חובבן";
$mid = "בינוני";
$pro = "מקצוען";
$mispar = "מספר שחקנים";
$rama = "רמה";
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

$queryAllCourts = "SELECT * From courts";
$courtNames = ["שם החוף"];
$r = $con->query($queryAllCourts);
if ($r->num_rows > 0) {
  while($court = $r->fetch_assoc()) {
      if(!in_array($court['beachName'], $courtNames)) {
        array_push($courtNames, $court['beachName']);
      }
  }
}
$query = "SELECT * From games";
$result = $con->query($query);
$games = [];
$date = "";
$beach = "שם החוף";
$level = "רמה";
$numberOfPlayers = "מספר שחקנים";
if(isset($_POST['date'])) {
  $date = $_POST['date'];
}
if(isset($_POST['beachName'])) {
  $beach = $_POST['beachName'];
}
if(isset($_POST['level'])) {
  $level = $_POST['level'];
}
if(isset($_POST['numberOfPlayers'])) {
  $numberOfPlayers = $_POST['numberOfPlayers'];
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $queryCourt = "SELECT * From courts WHERE id=".$row['courtId'];
      $res = $con->query($queryCourt);
      if ($res->num_rows == 1) {
        $rowCourt = $res->fetch_assoc();
        if(checkDateValid($row['gameDate']) && ($date == $row['gameDate'] || $date == "") &&
         ($level == $row['level'] || $level == "רמה") && ($beach == $rowCourt['beachName'] || $beach == "שם החוף") &&
         ($numberOfPlayers == $row['numberOfPlayers'] || $numberOfPlayers == "מספר שחקנים")) {
          $split = explode(",",$row['playerIds']);
          if($row['numberOfPlayers'] > count($split)) {
            array_push($games, $row);
          }
        }
      }
    }
}
?>

 <!-- ======= Header  ======= -->

<?php

include 'header.php';

?>
    <!-- ======= HTML Section ======= -->

    <main id="main">
      <div class="container RformBox">
           <div class="row">
            <div class="col-lg-12 contor-bg">
              <section class="about contor-bg">
                    <form class="form-inline" action="joinGame.php" method="post">
                      <?php
                        if(isset($_POST['date'])) {
                          ?>
                          <input type="date" class="form-control mb-2 mr-sm-2" name="date" value="<?php echo $_POST['date'] ?>" />
                          <?php
                        } else {
                          ?>
                          <input type="date" class="form-control mb-2 mr-sm-2" name="date" value="" />
                          <?php
                        }
                       ?>
                      <select class="form-control mb-2 mr-sm-2" name="beachName">
                        <?php
                          foreach($courtNames as $name) {
                            if(isset($_POST['beachName']) && $_POST['beachName'] == $name) {
                            ?>
                            <option value="<?php echo $name ?>" selected><?php echo $name ?></option>
                            <?php
                            } else {
                              ?>
                              <option value="<?php echo $name ?>"><?php echo $name ?></option>
                              <?php
                            }
                          }
                         ?>
                      </select>
                      <select class="form-control mb-2 mr-sm-2" name="level">
                        <option value="<?php echo $rama ?>"><?php echo $rama ?></option>
                        <?php
                            if(isset($_POST['level']) && $_POST['level'] == $amateur) {
                              ?>
                              <option value="<?php echo $amateur ?>" selected><?php echo $amateur ?></option>
                            <?php } else {
                              ?>
                              <option value="<?php echo $amateur ?>"><?php echo $amateur ?></option>
                              <?php
                            } ?>
                            <?php
                            if(isset($_POST['level']) && $_POST['level'] == $mid) {
                              ?>
                              <option value="<?php echo $mid ?>" selected><?php echo $mid ?></option>
                            <?php } else {
                              ?>
                              <option value="<?php echo $mid ?>"><?php echo $mid ?></option>
                              <?php
                            } ?>
                            <?php
                            if(isset($_POST['level']) && $_POST['level'] == $pro) {
                              ?>
                              <option value="<?php echo $pro ?>" selected><?php echo $pro ?></option>
                            <?php } else {
                              ?>
                              <option value="<?php echo $pro ?>"><?php echo $pro ?></option>
                              <?php
                            } ?>
                      </select>
                      <select class="form-control mb-2 mr-sm-2" name="numberOfPlayers">
                        <option value="מספר שחקנים"><?php echo $mispar ?></option>
                        <?php
                          if(isset($_POST['numberOfPlayers'])&& $_POST['numberOfPlayers'] == 4) {
                            ?>
                            <option value="4" selected>4</option>
                            <?php
                          } else {
                            ?>
                            <option value="4">4</option>
                            <?php
                          }
                         ?>
                         <?php
                           if(isset($_POST['numberOfPlayers']) && $_POST['numberOfPlayers'] == 6) {
                             ?>
                             <option value="6" selected>6</option>
                             <?php
                           } else {
                             ?>
                             <option value="6">6</option>
                             <?php
                           }
                          ?>
                          <?php
                            if(isset($_POST['numberOfPlayers']) && $_POST['numberOfPlayers'] == 8) {
                              ?>
                              <option value="8" selected>8</option>
                              <?php
                            } else {
                              ?>
                              <option value="8">8</option>
                              <?php
                            }
                           ?>
                           <?php
                             if(isset($_POST['numberOfPlayers']) && $_POST['numberOfPlayers'] == 10) {
                               ?>
                               <option value="10" selected>10</option>
                               <?php
                             } else {
                               ?>
                               <option value="10">10</option>
                               <?php
                             }
                            ?>
                            <?php
                              if(isset($_POST['numberOfPlayers']) && $_POST['numberOfPlayers'] == 12) {
                                ?>
                                <option value="12" selected>12</option>
                                <?php
                              } else {
                                ?>
                                <option value="12">12</option>
                                <?php
                              }
                             ?>
                      </select>
                      <button type="submit" class="btn btn-primary mb-2 form-control mr-sm-2" name="submit">סנן</button>
                    </form>
                    <br>

                    <div class="table-responsive">          
                    <table class="table table-hover"> 
                    <thead class="thead-dark">
                      <tr>  
                        <th>חוף</th>
                        <th>תאריך</th>
                        <th>שעה</th>
                        <th>סוג קרקע</th>
                        <th>רמה</th>
                        <th>מספר שחקנים </th>
                        <th>פרטים נוספים</th>
                      </tr>
                    </thead>
                      <?php
                        foreach ($games as $game) {
                          $split = explode(" ",$game['playerIds']);
                          $game['currentNumberOfPlayers'] = count($split); 
                          $query = "SELECT * From users WHERE id=".$game['captainId'];
                          $result = $con->query($query);
                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  $game['captainName'] = $row['fullName'];
                                  $game['captainPhone'] = $row['phoneNumber'];
                              }
                          }
                          $query = "SELECT * From courts WHERE id=".$game['courtId'];
                          $result = $con->query($query);
                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  $game['groundType'] = $row['groundType'];
                                  $game['address'] = $row['streetName'] . " " . $row['streetNumber'] . ", " . $row['city'];
                                  $game['beachName'] = $row['beachName'];
                              }
                          }
                      ?>
                      <form class="" action="joinGameMoreDetails.php" method="post">
                        <input type="hidden" name="gameId" value="<?php echo $game['id'] ?>">
                        <input type="hidden" name="beachName" value="<?php  echo $game['beachName'] ?>">
                        <input type="hidden" name="address" value="<?php echo $game['address'] ?>">
                        <input type="hidden" name="gameDate" value="<?php echo $game['gameDate'] ?>">
                        <input type="hidden" name="gameTime" value="<?php echo $game['gameTime'] ?>">
                        <input type="hidden" name="groundType" value="<?php echo $game['groundType'] ?>">
                        <input type="hidden" name="level" value="<?php echo $game['level'] ?>">
                        <input type="hidden" name="numberOfPlayers" value="<?php echo $game['numberOfPlayers'] ?>">
                        <input type="hidden" name="currentNumberOfPlayers" value="<?php echo $game['currentNumberOfPlayers'] ?>">
                        <input type="hidden" name="captainName" value="<?php echo $game['captainName'] ?>">
                        <input type="hidden" name="captainPhone" value="<?php echo $game['captainPhone'] ?>">

                        <tr>
                          <td><?php echo $game['beachName'] ?></td>
                          <td><?php echo $game['gameDate'] ?></td>
                          <td><?php echo $game['gameTime'] ?></td>
                          <td><?php echo $game['groundType'] ?></td>
                          <td><?php echo $game['level'] ?></td>
                          <td><?php echo $game['currentNumberOfPlayers'] . '/' . $game['numberOfPlayers'] ?></td>
                          <td><?php echo "<button class='btn btn-primary mb-2  btn-sm' type='submit' name='button'>פרטים נוספים</button>" ?></td>
                        </tr>
                      </form>

                      <?php
                        }
                       ?>

                    </table>
                    </div>
              </section>
            </div>
          </div>
        </div>
    </main>

    <!-- ======= Footer  ======= -->

 <?php

include 'footer.php';

?>
