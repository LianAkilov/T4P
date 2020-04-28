<?php
include("auth_session.php");

if(!isset($_SESSION["username"])) {
  header("Location: ../includes/login.php");

} else {
  header("Location: ../includes/openGame.php");
}

 ?>
