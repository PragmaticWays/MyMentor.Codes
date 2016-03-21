<?php

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ./login/");
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
        
        <?php include './resources/include/topBar.php'; ?>
        <?php include './resources/include/nav.php'; ?>
    
    </div>
    
    <?php include './resources/include/footer.php'; ?>
</body>
</html>