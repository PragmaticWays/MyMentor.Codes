<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Logout | MyMentor.Codes</title>

    <?php
        include('../resources/include/topBar.php');
    include('../resources/include/nav.php');
    ?>

            <link rel="stylesheet" type="text/css" href="../resources/css/main.css">

</head>

<body>

    <meta http-equiv="refresh" content="1;url=../login" />
    
    <h1>Logging Out...</h1>
    
    
     <?php
        include('../resources/include/footer.php');
    ?>

</body>
</html>