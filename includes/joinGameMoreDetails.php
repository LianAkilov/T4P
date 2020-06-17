<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
if(!isset($_POST['gameDate']) || !isset($_POST['gameTime']) || !isset($_POST['address']) || !isset($_POST['groundType']) || !isset($_POST['level']) || !isset($_POST['captainName']) || !isset($_POST['captainPhone']) ||
 !isset($_POST['beachName']) || !isset($_POST['numberOfPlayers']) || !isset($_POST['currentNumberOfPlayers']) || !isset($_POST['gameId'])) {
  header("Location: ../index.php");
}
$city = "";
$streetName = "";
$streetNumber = "";
$lat = "";
$lng = "";
$beachName = "";
$query = "SELECT courtId From games WHERE id=".$_POST['gameId'];
$res = $con->query($query);
if($res->num_rows == 1) {
  $row = $res->fetch_assoc();
  $queryCourt = "SELECT * From courts WHERE id=".$row['courtId'];
  $result = $con->query($queryCourt);
  if($result->num_rows == 1) {
      $court = $result->fetch_assoc();
      $city = $court['city'];
      $streetName = $court['streetName'];
      $streetNumber = $court['streetNumber'];
      $address = $streetName . " " . $streetNumber . ", " . $city;
      $lat = $court['latitude'];
      $lng = $court['longitude'];
      $beachName = $court['beachName'];
      $xmlData = "<markers> \n <marker id='1' name='". $beachName . "' address='" . $address . "' lat='" . $lat . "' lng='" . $lng ."' type='beach'/> \n </markers>";
      $file = fopen("address.xml", "w");
      fwrite($file, $xmlData);
      fclose($file);
  }
}
?>

   <!-- ======= Header  ======= -->

 <?php

include 'header.php';

?>

    <!-- ======= HTML Section ======= -->
    
  <main id="main">
      <section class="about"> 
        <div class="container RformBox">
          <div class="row">
            <div class="col-md-6">
             <div class="container">
              <div class="openGameForm">
              <h4 class="title">פרטי המשחק</h4>
              <h6><?php echo "חוף: ".$_POST['beachName'] ?></h6>
              <h6><?php echo "כתובת: ". $_POST['address'] ?></h6>
              <h6><?php echo "מגרש מספר: ". $_POST['courtNumber'] ?></h6>
              <h6><?php echo "תאריך: ". $_POST['gameDate'] ?></h6>
              <h6><?php echo "שעה: ". $_POST['gameTime'] ?></h6>
              <h6><?php echo "סוג קרקע: ". $_POST['groundType'] ?></h6>
              <h6><?php echo "מספר שחקנים: ". $_POST['currentNumberOfPlayers']. "/" . $_POST['numberOfPlayers'] ?></h6></br>
              <h4 class="title">פרטי הקפטן</h4>
              <h6><?php echo "שם הקפטן: ". $_POST['captainName'] ?></h6>
              <h6><?php echo "מספר טלפון: ". '0'. $_POST['captainPhone'] ?></h6><br>
             <form class="" action="javascript:joinGame()" method="post"> 
                <input type="hidden" name="gameId" value="<?php echo $_POST['gameId'] ?>">
                <input type="hidden" name="gameDate" value="<?php echo $_POST['gameDate'] ?>">
                <input type="hidden" name="gameTime" value="<?php echo $_POST['gameTime'] ?>">
                <button type="submit" class="btn btn-primary" name="submit">להצטרפות למשחק</button>
                <input type="button" class="btn btn-success" onclick="location.href='joinGame.php';" value="חזרה למשחקים פעילים" /> 
              </form>
              </div>
             </div>
            </div>

            <div class="col-md-6">
            <div id="map">

            <script>
          var customLabel = {
            restaurant: {
              label: 'R'
            },
            bar: {
              label: 'B'
            }
          };

            function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>),
              zoom: 13
            });
            var infoWindow = new google.maps.InfoWindow;

              // Change this depending on the name of your PHP or XML file
              downloadUrl('address.xml', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                  var id = markerElem.getAttribute('id');
                  var name = markerElem.getAttribute('name');
                  var address = markerElem.getAttribute('address');
                  var type = markerElem.getAttribute('type');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('lat')),
                      parseFloat(markerElem.getAttribute('lng')));

                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  strong.textContent = name
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));

                  var text = document.createElement('text');
                  text.textContent = address
                  infowincontent.appendChild(text);
                  var icon = customLabel[type] || {};
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                  });
                });
              });
            }



          function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
              if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
              }
            };

            request.open('GET', url, true);
            request.send(null);
          }

          function doNothing() {}
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIkYnBGfs9hqyIL9H5iAxzD6H070fDiIE&callback=initMap">
        </script>

            </div>
            </div>
        </div>
     </div>
  </section>
</main>
    
    <script type="text/javascript">
    function joinGame() {
      var gameId = document.getElementsByName("gameId")[0].value;
      var date = document.getElementsByName("gameDate")[0].value;
     var time = document.getElementsByName("gameTime")[0].value;
      alertify.confirm('','האם להצטרף משחק בתאריך ' + date + ' בשעה ' + time + '?',
        function() {
          var init_xhttp = new XMLHttpRequest();
          init_xhttp.onreadystatechange = function() {
            if (init_xhttp.readyState == XMLHttpRequest.DONE) {
              // alertify.alert('Mobile Group',init_xhttp.responseText);
              alertify.alert('', init_xhttp.responseText);
              setTimeout(() => {
                window.location.href = "myGames.php";
              }, 1500);
            }
          }
          init_xhttp.open("POST", "addPlayerToExistingGame.php", true);
          init_xhttp.setRequestHeader('Content-type',
            'application/x-www-form-urlencoded');
          init_xhttp.send('gameId=' + gameId);
        },
        function() {});
    }
    </script>

    <!-- ======= Footer  ======= -->

 <?php

include 'footer.php';

?>
