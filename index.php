<?php

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: /mymentor.codes/login/");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home | MyMentor.Codes</title>

    <link rel="stylesheet" type="text/css" href="./resources/css/main.css">

</head>

<body>
    <div class="wrapper">
        
        <?php include 'resources/include/topBar.php'; ?>
        <?php include 'resources/include/nav.php'; ?>
    
    </div>
    
    <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/resources/include/footer.php";
        include_once($path);
    ?>
</body>
</html>