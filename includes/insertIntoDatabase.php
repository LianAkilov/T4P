
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");

        $fullName = stripslashes($_REQUEST['fullName']);
        $fullName    = mysqli_real_escape_string($con, $fullName);

        $age    = stripslashes($_REQUEST['age']);
        $age    = mysqli_real_escape_string($con, $age);

        $phoneNumber    = stripslashes($_REQUEST['phoneNumber']);
        $phoneNumber    = mysqli_real_escape_string($con, $phoneNumber);

        $gender    = stripslashes($_REQUEST['gender']);
        $gender    = mysqli_real_escape_string($con, $gender);

        $level    = stripslashes($_REQUEST['level']);
        $level    = mysqli_real_escape_string($con, $level);

        $query    = "INSERT into `users` (username, password, email, create_datetime, fullName, age, phoneNumber, gender, level)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime', '$fullName', '$age', '$phoneNumber', '$gender', '$level' )";
        $result   = mysqli_query($con, $query);

        if ($result) {
            header("Location: ../index.php");
        } else {
            header("Location: R.php");
        }
    } else {}
?>



