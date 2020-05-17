<?php
//include auth_session.php file on all user panel pages
require('includes/db.php');
include("includes/auth_session.php");
?>

<?php

include 'includes/HomepageHeader.php';

?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animated fadeInDown">Welcome to <span>Team4Play</span></h2>
          <p class="animated fadeInUp">לשחק עם חברים מעולם לא היה פשוט יותר!<br>
            צרו משחק בחוף,תאריך,מיקום ורמת מיומנות המתאימה לכם ושאר החברים יצטרפו לבד, רק תקימו קבוצה ותהנו :)</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animated fadeInDown">חם מהשטח</h2>
          <p class="animated fadeInUp"> בחוף גורדון הוקמו עוד 4 מגרשים לרווחת הציבור, איזה כיף לנו.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animated fadeInDown"> חשוב לדעת</h2>
          <p class="animated fadeInUp">בתל-אביב-יפו 13 חופים אשר משתרעים מגבול הרצליה בצפון עד גבול בת-ים בדרום באורך של 14 ק"מ, המושכים אליהם במהלך חודשי הקיץ אלפי מתרחצים מהארץ ומהעולם.
<br><br> הפסקת שירותי ההצלה בחופים
בהתאם להנחיות משרד הבריאות, תחנות ההצלה לא יפעלו ומתקני החוף לא יהיו זמינים עד להודעה חדשה.</p>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">הקודם</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">הבא</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 ">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxs-face"></i></div>
              <h4 class="title"><a href="includes/checkSessionOpenProfile.php">אזור אישי</a></h4>
              <p class="description">פרופיל ולוח משחקים עתידי</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 " >
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-user-plus"></i></div>
              <h4 class="title"><a href="includes/checkSessionJoin.php" >הצטרף למשחק</a></h4>
              <p class="description">הצטרפות למשחק קיים </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 " >
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-paper-plane"></i></div>
              <h4 class="title"><a href="includes/checkSessionOpenGame.php">צור משחק חדש</a></h4>
              <p class="description">צור משחק בהתאמה אישית </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 " >
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="#hero">חדשות ועדכונים</a></h4>
              <p class="description">לוח המנצחים של החודש</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" >
      <div class="container">

        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <img src="assets/img/vollyVideo.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=sN_3QwQOwas" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
         <img src="assets/img/vollyVideo2.jpg" class="img-fluid" alt="">
            <a href="https://https://www.youtube.com/watch?v=Hg7nCIDhiOg" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Footer  ======= -->
  </main>
<?php

include 'includes/HomepageFooter.php';

?>
