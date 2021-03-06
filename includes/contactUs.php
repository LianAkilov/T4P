
<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
?>

   <!-- ======= Header  ======= -->

<?php

include 'header.php';

?>
    <!-- ======= HTML Section  ======= -->

  <main id="main">
    <section class="about contor-bg">
      <div class="container">
        <div class="row">

           <div class="container">
           <h1 class="BigCoteret ">דברו איתנו</h1>
           </div>
          
           <div class="col-lg-6">
            <form action="" method="" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="שם מלא" data-rule="minlen:4" data-msg="הכנס לפחות 4 תווים" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="כתובת אימייל" data-rule="email" data-msg="הכנס כתובת מייל תקינה" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="נושא" data-rule="minlen:4" data-msg="הכנס לפחות 8 תווים" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="כתוב לנו משהו" placeholder="תוכן הפנייה"></textarea>
                <div class="validate"></div>
              </div>
              
             <!-- <button type="submit" class="btn btn-primary" id="contactUsButton">שלח פנייה</button> -->
             <button onclick="window.location.href='landingPage.php'" class="btn btn-primary" id="contactUsButton">שלח פנייה</button>
            </form>
          </div>
		   
          <div class="col-lg-6">
           <div class="carousel-item active"> 
            <div class="carousel-container">
              <img src= "../assets/img/Pop1.jpg" id="contactUsLogo">
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