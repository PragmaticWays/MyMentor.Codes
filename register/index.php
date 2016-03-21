<?php

// if user logged on, go to homepage
if(isset($_SESSION['id'])) {
    header('Location: ../');
}
// define error vars
$user_taken_error = false;
$user_empty_error = false;
$pass_empty_error = false;
$Cpass_empty_error = false;
$pass_match_error = false;
$email_error = false;
$email_empty_error = false;
$email_taken_error = false;


if(isset($_POST['register'])) {
    
    // include database connection
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/config/connect.php";
    include_once($path);
    
    // sanatize user input
    $username = strip_tags($_POST['user']);
    $password = strip_tags($_POST['pass']);
    $confirm_password = strip_tags($_POST['confirm_pass']);
    $email = strip_tags($_POST['email']);
    
    $username = stripslashes($username);
    $password = stripslashes($password);
    $confirm_password = stripslashes($confirm_password);
    $email = stripslashes($email);
    
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
     $confirm_password = mysqli_real_escape_string($conn, $confirm_password);
    $email = mysqli_real_escape_string($conn, $email);
    
    // encrypt pass here
    
    
    
    // check for existing account or inaccurate user input
    $sql_store = "INSERT into users (username, password, email) VALUES ('$username', '$password', '$email')";
    $sql_fetch_username = "SELECT username FROM users WHERE username = '$username'";
    $sql_fetch_email = "SELECT email FROM users WHERE email = '$email'";
    
    $query_username = mysqli_query($conn, $sql_fetch_username);
    $query_email = mysqli_query($conn, $sql_fetch_email);
    
    
    if(mysqli_num_rows($query_username)) {
        $user_taken_error = true;
    } else if($username == "") {
       $user_empty_error = true;
    } else if($password == "") {
        $pass_empty_error = true;
    } else if($confirm_password == "") {
        $Cpass_empty_error = true;
    } else if($password != $confirm_password) {
        $pass_match_error = true;
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = true;
    } else if($email == "") {
       $email_empty_error = true;
    } else if(mysqli_num_rows($query_email)) {
        $email_taken_error = true;
    } else {
        
        // if no existing account and input is good, store in database and proceed to home, which redirects to login.
        mysqli_query($conn, $sql_store);
        header('Location: ../');
    }   
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Register | MyMentor.Codes</title>

    <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <!-- include top status bar and navigation bar -->
        <?php
            include('../resources/include/topBar.php');
        include('../resources/include/nav.php')
        ?>
        
        
        <div class="container" style="margin-top: 100px;">
            <center><h2>Registration</h2></center>
            <div id="error"></div>
            <form action="./" method="post" enctype="multipart/form-data">
                <input type="text" name="user" placeholder="Username"><br>
                <input type="password" name="pass" placeholder="Password"><br>
                <input type="password" name="confirm_pass" placeholder="Confirm Password"><br>
                <input type="text" name="email" placeholder="Email Address"><br>
                <center><input type="submit" name="register" value="Register"></center>
            </form>
        </div>
    
        <!-- get error from PHP and display appropriote error msg.
             will move to separate file -->
        <script>
            $('#error').hide();
        </script>
        
        <!-- username taken -->
        <?php if($user_taken_error): ?>
            <script>
                document.getElementById("error").innerHTML = "Username already taken";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- empty username -->
        <?php if($user_empty_error): ?>
            <script>
                document.getElementById("error").innerHTML = "You need a username";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- pass empty -->
        <?php if($pass_empty_error): ?>
            <script>
                document.getElementById("error").innerHTML = "You need a password";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- confirm pass empty -->
        <?php if($Cpass_empty_error): ?>
            <script>
                document.getElementById("error").innerHTML = "Please confirm your password";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- pass mismatch -->
        <?php if($pass_match_error): ?>
            <script>
                document.getElementById("error").innerHTML = "Your passwords don't match";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- email error -->
        <?php if($email_error): ?>
            <script>
                document.getElementById("error").innerHTML = "Invalid email address";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- email empty -->
        <?php if($email_empty_error): ?>
            <script>
                document.getElementById("error").innerHTML = "You need an email address";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        <!-- email taken -->
        <?php if($email_taken_error): ?>
            <script>
                document.getElementById("error").innerHTML = "That email address already has an account";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
        
    </div> <!-- end wrapper -->
    
    <!-- include footer -->
    <?php
        include('../resources/include/footer.php')
    ?>
        
</body>
</html>