<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Logout | MyMentor.Codes</title>

    <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/resources/include/topBar.php";
        include_once($path);
    
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mymentor.codes/resources/include/nav.php";
        include_once($path);
    ?>

            <link rel="stylesheet" type="text/css" href="../resources/css/main.css">

</head>

<body>

    <meta http-equiv="refresh" content="1;url=../login" />
    
    <h1>Logging Out...</h1>

</body>
</html>