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
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: ../index.php");
        } else {
            header("Location: login.php");
        }
    } else {
?>



<!---  צריך להעתיק את כל המבנה של המיין ואז לנסות עיצובים חדשים  ---->
<!--- -------------------------------------------------------------  ---->


<form id="logForm" method="post" name="login" style="margin-top: 10%">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"> להרשמה לחץ <a href="R.php">כאן</a></p>
</form>



 <!---  לא לשכוח להדביק את שורות 51-53  ---->
<!--- -------------------------------------------------------------  ---->

<?php
    }
?>
   
<?php

include 'footer.php';

?>