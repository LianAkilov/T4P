<!DOCTYPE html>
<html lang="he" dir="rtl">

 <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Team4Play</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="../assets/css/TP4Style.css" rel="stylesheet">   
    <link href="../assets/css/alertify.css" rel="stylesheet">
    <link href="../assets/css/alertify.min.css" rel="stylesheet">
    <link href="../assets/css/alertify.rtl.css" rel="stylesheet">
    <link href="../assets/css/alertify.rtl.min.css" rel="stylesheet">
    <script src="../assets/js/alertify.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
  </head>

<body>

  <!-- ======= תפריט כשמחוברים או מנותקים ======= -->

  <header id="header" class="fixed-top header-transparent">

  <?php

    if(!isset($_SESSION["username"])) {

          echo '  <a href="../index.php"><img style= width:160px src="../assets/img/logoImg.jpg.png" alt="" class="img-fluid"></a>
   <div class="container">

    <nav class="nav-menu float-right d-none d-lg-block">
    <ul>
      <li><a href="contactUs.php">דברו איתנו</a></li>
      <li><a href="aboutUs.php">מי אנחנו?</a></li>
    <li><a href="login.php">אזור אישי</a>
    <li><a href="login.php" style="color:#0099ff; margin-left:15px">התחבר</a></li>

    </ul>
   </nav> <!--- .nav-menu -->
  </div>';
    }
    else{
          echo '<a href="../index.php"><img style= width:160px src="../assets/img/logoImg.jpg.png" alt="" class="img-fluid"></a>
   <div class="container">

    <nav class="nav-menu float-right d-none d-lg-block">
    <ul>
      <li><a href="contactUs.php">דברו איתנו</a></li>
      <li><a href="aboutUs.php">מי אנחנו?</a></li>
      <li class="drop-down"><a href="#">אזור אישי</a>
        <ul>
          <li><a href="Profile.php"> פרופיל</a></li>
          <li><a href="myGames.php">המשחקים שלי</a></li>
          <li><a href="openGame.php">יצירת משחק חדש</a></li>
          <li><a href="joinGame.php">הצטרפות למשחק קיים</a></li>
        </ul>
      </li>
      <li><a href="logout.php" style="color:#ff3300; margin-left:15px">התנתק</a>


    </ul>
   </nav> <!--- .nav-menu -->
  </div> '; }
   ?>


</header> <!-- End Header -->
