

<!DOCTYPE html>
<html lang="he" dir="rtl">

 <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
    <title>Team4Play</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	
	
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  
  
    <!-- Template Main CSS File -->
    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/base.css" rel="stylesheet">
    <link href="../assets/css/test1.css" rel="stylesheet">    
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  </head>

<body>

  <!-- ======= מציג כפתור התחבר אם מנותקים ולהפך ======= -->
  
  <header id="header" class="fixed-top header-transparent">

  <?php
  
    if(!isset($_SESSION["username"])) {

          echo '<button class="loginButton"><a href="includes/login.php">login </a> </button>';
    }
    else{
          echo '<button class="loginButton"><a href="includes/logout.php">log out </a> </button> '; }
   ?>
   
  <!-- ======= תפריט כשמחוברים או מנותקים ======= -->
  
  
   <?php
  
    if(!isset($_SESSION["username"])) {

          echo '  <a href="index.php"><img style= width:13% src="assets/img/logoImg.jpg.png" alt="" class="img-fluid"></a>
   <div class="container">

    <nav class="nav-menu float-right d-none d-lg-block">
    <ul>
      <li><a href="includes/contactUs.php">דברו איתנו</a></li>
      <li><a href="includes/aboutUs.php">מי אנחנו?</a></li>
	  <li><a href="#">אזור אישי</a>
    </ul>
   </nav> <!--- .nav-menu -->
  </div>';
    }
    else{
          echo '    <a href="index.php"><img style= width:13% src="assets/img/logoImg.jpg.png" alt="" class="img-fluid"></a>
   <div class="container">

    <nav class="nav-menu float-right d-none d-lg-block">
    <ul>
      <li><a href="includes/contactUs.php">דברו איתנו</a></li>
      <li><a href="includes/aboutUs.php">מי אנחנו?</a></li>
      <li class="drop-down"><a href="#">אזור אישי</a>
        <ul>     
          <li><a href="includes/Profile.php"> פרופיל</a></li>
          <li><a href="includes/myGames.php">משחקים קרובים</a></li>
          <li><a href="includes/testdb.php">בדיקת DB</a></li>

        </ul>
      </li>

    </ul>
   </nav> <!--- .nav-menu -->
  </div> '; }
   ?>



</header> <!-- End Header -->

