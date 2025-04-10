<?php session_start(); ?>

<!DOCTYPE html>

<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db="supportflowab";

    $conn=mysqli_connect($host, $user, $pass, $db);

    $sql="SELECT * FROM tblmatters WHERE status='open' OR status='ongoing' ORDER BY created DESC";
    $result = mysqli_query($conn, $sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tienne:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="vertical_align"></div>
            <img src="Bilder/Logo.webp" alt="logo">
        
            <div class="filler"></div>
        
            <img src="Bilder/Icons/mail.png" alt="mail" onclick="location.href='Mail.php'">
            <img src="Bilder/Icons/home.png" alt="home" onclick="location.href='index.php'">
            <img src="Bilder/Icons/bar-chart.png" alt="bar-chart" onclick="location.href='Charts.php'">

            <div class="filler"></div>

            <img src="Bilder/Icons/notification.png" alt="notification">
            <img src="Bilder/Icons/user.png" alt="user" onclick="location.href='Profile.php'">
        </div>
    </header>



    <div class="rest">
    
    </div>

    
</body>
</html>