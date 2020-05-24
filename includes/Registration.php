 <!-- ======= Header ======= -->

<?php

include 'header.php';

?>

    <!-- ======= HTML Section ======= -->
    
<main id="main">
   <section class="about contor-bg" >
      <div class="container RformBox">
        <div class="row">
		    <div class="col-md-12 contor-bg">
             <div class="container">
             <h1 class="BigCoteret">צור חשבון</h1> 

                  <form action="insertUserIntoDatabase.php" method="post">
                      <label for="username">שם משתמש</label><br>
                      <input type="text" name="username" placeholder="TheAmazingOr" required><br>
                      <label for="password">סיסמא</label><br>
                      <input type="password" name="password" placeholder="*********" required><br>
                      <label for="identificationNumber">ת''ז</label><br>
                      <input type="number" class="form-group" name="identificationNumber" placeholder="204066985"><br>
                      <label for="email">מייל</label><br>
                      <input type="text" name="email" placeholder="orR@gmail.com" required><br>
                      <label for="fullName">שם מלא</label><br>
                      <input type="text" class="form-group" name="fullName" placeholder="אור"><br>
                      <label for="age">גיל</label><br>
                      <input type="number" class="form-group" name="age" placeholder="27"><br>
                      <label for="phoneNumber">מספר טלפון</label><br>
                      <input type="number" class="form-group" name="phoneNumber" placeholder="0546688624"><br>

                      <label for="exampleFormControlSelect1">מין</label>
                      <select class="form-control" name="gender" id="exampleFormControlSelect1">
                      <option value="גבר">גבר</option>
                      <option value="אישה">אישה</option>
                      </select> </br></br>
                      
                      <label for="exampleFormControlSelect1">רמת משחק</label>
                      <select class="form-control" name="level" id="exampleFormControlSelect1">
                      <option value="חובבן">חובבן</option>
                      <option value="בינוני">בינוני</option>
                      <option value="מקצוען">מקצוען</option>
                      </select>      
                      </br>
                      <input type="reset" value="נקה טופס" class="btn btn-primary">
                      <input type="submit" value="שלח" class="btn btn-primary">

                 </form>
             </div>
         </div>
      </div>
  </div>
</section><!-- End About Section -->
      
</main>
    
  <!-- ======= Footer ======= -->
   
<?php

include 'footer.php';

?>