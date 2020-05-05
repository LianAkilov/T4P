<?php
    session_start();
    $strSQL = "SELECT id FROM users WHERE username = '".$_SESSION['username']."'";
    $rs = mysqli_query($con, $strSQL);
    while($row = mysqli_fetch_array($rs)) {
        $_SESSION["playerID"]= $row['id'];
        }
    
    
?>
