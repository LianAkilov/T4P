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
   <div class="row">
            <div class="container">
            <h1 class= "BigCoteret" >קצת עלינו</h1>
            </div>

          <div class="col-lg-6 pt-4 pt-lg-0" style= text-align:right color:black;>
             <h3>Team4Play</h3>
            <p class="font-italic" >
             team4play הינה פלטפורמה שנועדה להקל על תהליך ההתארגנות לקבוצות בשביל משחק קבוצתי. <br><br>
			 באמצעות האתר, כל אחד יכול ליצור פרופיל שחקן וליצור משחק כך שחבריו או כל אדם אחר יוכל להצטרף אליו, וכמובן ניתן להסתכל בלוח המשחקים ולהצטרף למשחק קיים.
			 </p>
			 <p class="font-italic"> מטרת האתר הייתה להקל עליכם שלא תצטרכו להסתבך בקבוצות וצ'אטים כדי לארגן משחק, ככה שתוכלו להתמקד בדבר החשוב באמת- להנות!!!
			 </p>
              <p class="font-italic"> <a href="contactUs.php"> יש לכם הצעות ייעול בשבילנו? נשמח לשמוע! שלחו לנו הודעה.. </a>
            </p>
          </div>

		 <div class="col-lg-6">
      <div class="carousel-item active">
        <div class="carousel-container">
          <img class="imageOpacity" src= "../assets/img/pop3S.png" id="contactUsLogo">
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