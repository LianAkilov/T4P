<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");

$charset = mysqli_character_set_name($con);
printf ("Current character set is %s\n",$charset);

?>

