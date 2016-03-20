<?php

session_start();

if (isset($_POST['login'])) {
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mymentor.codes/config/connect.php";
    include_once($path);
    
    $username = strip_tags($_POST['user']);
    $password = strip_tags($_POST['pass']);
    
    $username = stripslashes($username);
    $password = stripslashes($password);
    
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    

    
    // encrypt password here
    
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    echo $id;
    $db_password = $row['password'];
    
    
    
    if ($password == $db_password) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/";
        header("Location: ../" );
    } else {
       $cred_error = "";
    }
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | MyMentor.Codes</title>
    


    <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  
</head>

<body>
    
    <div class="wrapper">
        
            <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/resources/include/topBar.php";
        include_once($path);
    
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/resources/include/nav.php";
        include_once($path);
    ?>

    <div class="container" style="margin-top: 100px;">
        <center><h2>Please Log In</h2></center>
        <div id="error"></div>
        <form action="./" method="post" enctype="multipart/form-data">
            <input type="text" name="user" placeholder="username"><br>
            <input type="password" name="pass" placeholder="password"><br>
            <center><input type="submit" name="login" value="Login"></center>
        </form>
    </div>
    
    <script>
        $('#error').hide();
    </script>
            <?php if(isset($cred_error)): ?>
            <script>
                document.getElementById("error").innerHTML = "Invalid username/password";
                $('#error').fadeIn(700);
            </script>
        <?php endif ?>
        
    </div>
    
    
        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/resources/include/footer.php";
        include_once($path);
    ?>

</body>
</html>