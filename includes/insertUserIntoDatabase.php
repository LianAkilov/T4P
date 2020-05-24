
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    $testUsername=$_POST['username'];
    $testEmail=$_POST['email'];
    $testidentification=$_POST['identificationNumber'];

    $userQuery= "SELECT username FROM users WHERE username='$testUsername'";
    $emailQuery= "SELECT email FROM users WHERE email='$testEmail'";
    $identificationQuery= "SELECT identificationNumber FROM users WHERE identificationNumber='$identificationNumber'";

    $res = $con->query($userQuery);
    $res2 = $con->query($emailQuery);
    $res3 = $con->query($identificationQuery);


    if ($res->num_rows == 1 || $res2->num_rows == 1 || $res3->num_rows == 1 ) {
    // output data of each row
       header('Location: userRegError.php');
    }

    else{

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

        $identificationNumber = stripslashes($_REQUEST['identificationNumber']);
        $identificationNumber    = mysqli_real_escape_string($con, $identificationNumber);

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

        $query    = "INSERT into `users` (username, password, email, create_datetime, identificationNumber, fullName, age, phoneNumber, gender, level)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime', '$identificationNumber', '$fullName', '$age', '$phoneNumber', '$gender', '$level' )";
        $result   = mysqli_query($con, $query);

        if ($result) {
            header("Location: ../index.php");
        } else {
            header("Location: Registration.php");
        }
    } else {}

}
?>



