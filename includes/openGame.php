<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
$query    = "SELECT * From courts";
$courts   = $con->query($query);
$courtsArr = [];
$xmlData = "<markers> \n ";
$numBeaches = 1;
if ($courts->num_rows > 0) {
    // output data of each row
    while($row = $courts->fetch_assoc()) {
        if(!in_array($row['beachName'],$courtsArr)) {
          array_push($courtsArr, $row['beachName']);
          $city = $row['city'];
          $streetName = $row['streetName'];
          $streetNumber = $row['streetNumber'];
          $address = $streetName . " " . $streetNumber . ", " . $city;
          $xmlData = $xmlData ."<marker id='" . $numBeaches . "' name='". $row['beachName'] . "' address='" . $address . "' lat='" . $row['latitude'] . "' lng='" . $row['longitude'] ."' type='beach'/> ";
          $numBeaches = $numBeaches + 1;
        }
    }
}
$xmlData = $xmlData . " \n </markers>";
$file = fopen("address.xml", "w");
fwrite($file, $xmlData);
fclose($file);
?>

<?php

include 'headerMap.php';

?>

    <!-- ======= HTML Section ======= -->

    <link href="../assets/css/testCoral.css" rel="stylesheet">

    <main id="main">
      <section class="about">
        <div class="container RformBox">
          <div class="row">
            <div class="col-lg-6 contor-bg">
            <div class="container">

              <form class="openGameForm" action="openGameChooseCourt.php" method="post">
                <h3 class="title">בחר תאריך</h3>
                <div class=" form-control-lg">
                <input type="date" name="date" value="<?= date('Y-m-d', time()); ?>" />
                </div>
                </br></br></br>

                <h3 class="title">בחר חוף</h3>
                <select class="form-control form-control-lg" name="courtName">
                  <?php
                    foreach($courtsArr as $courtBeach){
                    ?>
                    <option value="<?php echo $courtBeach ?>">
                      <?php echo $courtBeach?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
                  </br>
             <button type="submit" class="btn btn-primary" value="submit" id="continue">המשך</button>
              </form>
            </div>
            </div>

      <div class="col-lg-6 contor-bg">
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
          center: new google.maps.LatLng(31.7683, 35.2137),
          zoom: 6
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
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIkYnBGfs9hqyIL9H5iAxzD6H070fDiIE&callback=initMap">
      </script>

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
