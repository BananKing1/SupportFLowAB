<!DOCTYPE html>

<?php
    $server = "localhost";
    $user = "root";
    $pass = "";

    $conn=mysqli_connect($server, $user, $pass, "supportflowab");

    $sql="SELECT * FROM tblmatters WHERE status='open' OR status='ongoing' ORDER BY created DESC";
    $result = mysqli_query($conn, $sql);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tienne:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
    <div class="vertical_align"></div>
            <img src="Bilder/Logo.webp" alt="logo">
        
            <div class="filler"></div>
        
            <img src="Bilder/Icons/home.png" alt="home">
            <img src="Bilder/Icons/task.png" alt="task" onclick="window.location.href = 'task.php';">
            <img src="Bilder/Icons/mail.png" alt="mail">
            <img src="Bilder/Icons/bar-chart.png" alt="bar-chart">

            <div class="filler"></div>

            <img src="Bilder/Icons/notification.png" alt="notification">
            <img src="Bilder/Icons/user.png" alt="user">
        </div>
    </header>

    <div class="rest">

<?php
    $sql = "SELECT * FROM tblmatters";
    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){ 
        ?>
        <div class="StatusUpdate">
            <h2>Ärende: <?=$row['matters']?></h2>
            <h2>Beskrivning: <?=$row['beskrivning']?></h2>
            <h2>Status: <?=$row['status']?></h2>
            <h2>Prioritet: <?=$row['priority']?></h2>
        </div>
    <?php }
?>
    </div>
</body>
</html>
