 <!-- ======= Header ======= -->

<?php

include 'header.php';

?>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: ../index.php");
        } else { ?> <!-- מציג את עמוד ההתחברות עם שגיאה -->

        <main id="main">
        <section class="about contor-bg" >
        <div class="container" id="LoginRformBox">
        <div class="row">
        <div class="col-lg-12 contor-bg">

	    <form action="" method="POST" id="loginPage">
        <div class="imgcontainer">
        <img src="../assets/img/about-us2.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
        <p><?php echo '<span style="color:red;text-align:center;">שם משתמש או סיסמא לא קיימים במערכת</span>'; ?> </p>
        <label for="username"><b>שם משתמש</b></label>
        <input type="text" placeholder="הכנס שם משתמש" name="username" required>

        <label for="password"><b>סיסמא</b></label>
        <input type="password" placeholder="הכנס סיסמא" name="password" required>
        
		<button type="submit" class="btn btn-lg btn-primary btn-block">התחבר</button>
		<button type="button" class="btn btn-lg btn-success btn-block"><a href="Registration.php" style="color: white"> אין לך משתמש? הרשם כאן </a></button> 
        </div>
        </form>

        </div>
        </div>
        </div>
        </section>
        </main>
          
<?php
        }
    } else { ?>

 <!-- ======= HTML Section ======= -->

<main id="main">
<section class="about contor-bg" >
<div class="container" id="LoginRformBox">
     <div class="row">
      <div class="col-lg-12 contor-bg">

	  <form action="" method="POST" id="loginPage">
        <div class="imgcontainer">
        <img src="../assets/img/about-us2.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
        <label for="username"><b>שם משתמש</b></label>
        <input type="text" placeholder="הכנס שם משתמש" name="username" required>

        <label for="password"><b>סיסמא</b></label>
        <input type="password" placeholder="הכנס סיסמא" name="password" required>
        
		<button type="submit" class="btn btn-lg btn-primary btn-block">התחבר</button>
		<button type="button" class="btn btn-lg btn-success btn-block"><a href="Registration.php" style="color: white"> אין לך משתמש? הרשם כאן </a></button> 
        </div>
     </form>

     </div>
 </div>
</div>
</section>
</main>


<?php } ?>

 <!-- ======= Footer  ======= -->
   
<?php

include 'footer.php';

?>