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
        
            <img src="Bilder/Icons/task.png" alt="task" onclick="location.href='task.php'">
            <img src="Bilder/Icons/home.png" alt="home" onclick="location.href='home.php'">
            <img src="Bilder/Icons/bar-chart.png" alt="bar-chart" onclick="location.href='Charts.php'">

            <div class="filler"></div>

            <img src="Bilder/Icons/user.png" alt="user" onclick="location.href='Profile.php'">
        </div>
    </header>



    <div class="rest">
    <?php 
        if(isset($_SESSION['role'])){
            if(isset($_SESSION['id'])){
                $xrole = $_SESSION['role'];
                $xid = $_SESSION['id'];
                
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db="supportflowab";

                $conn=mysqli_connect($host, $user, $pass, $db);

                $sql="SELECT * FROM tblmatters WHERE status='open' OR status='ongoing' ORDER BY created DESC";
                $result = mysqli_query($conn, $sql);

                if(intval($xrole) >= 10){ ?>
                Personliga ärenden <br>
                ____________________________________________________________
                <br><br> Kritisk prioritering:
                    <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE status='ongoing' AND shared=$xid AND priority='critical' ORDER BY created DESC";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){ 
                        ?>                    
                            <div class="StatusUpdate">
                                <h2>Ärende: <?=$row['matters']?></h2>
                                <h2>Status: <?=$row['status']?></h2>
                                Av: <?=$row['rapport']?><br>
                                Kontakt: <?=$row['contact']?><br>
                                Skapad: <?=$row['created']?><br>
                                Senast uppdaerad: <?=$row['update']?><br>
                                <h2>Beskrivning:</h2> <?=$row['beskrivning']?>
                                <div class="right">                                        
                                    <button onclick="Finish()">Slutför</button>
                                </div>
                            </div>       
                        <?php }
                        ?>
                    </div> 
                    
                    ____________________________________________________________
                    <br> Hög prioritering:
                    <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE status='ongoing' AND shared=$xid AND priority='high' ORDER BY created DESC";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){ 
                        ?>                    
                            <div class="StatusUpdate">
                                <h2>Ärende: <?=$row['matters']?></h2>
                                <h2>Status: <?=$row['status']?></h2>
                                Av: <?=$row['rapport']?><br>
                                Kontakt: <?=$row['contact']?><br>
                                Skapad: <?=$row['created']?><br>
                                Senast uppdaerad: <?=$row['update']?><br>
                                <h2>Beskrivning:</h2> <?=$row['beskrivning']?>
                                <div class="right">                                        
                                    <button onclick="Finish()">Slutför</button>
                                </div>
                            </div>       
                        <?php }
                        ?>
                    </div> 
                
                    ____________________________________________________________
                    <br> Medium prioritering:
                    <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE status='ongoing' AND shared=$xid AND priority='medium' ORDER BY created DESC";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){ 
                        ?>                    
                            <div class="StatusUpdate">
                                <h2>Ärende: <?=$row['matters']?></h2>
                                <h2>Status: <?=$row['status']?></h2>
                                Av: <?=$row['rapport']?><br>
                                Kontakt: <?=$row['contact']?><br>
                                Skapad: <?=$row['created']?><br>
                                Senast uppdaerad: <?=$row['update']?><br>
                                <h2>Beskrivning:</h2> <?=$row['beskrivning']?>
                                <div class="right">                                        
                                    <button onclick="Finish()">Slutför</button>
                                </div>
                            </div>       
                        <?php }
                        ?>
                    </div> 

                    ____________________________________________________________
                    <br> Låg prioritering:
                    <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE status='ongoing' AND shared=$xid AND priority='low' ORDER BY created DESC";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){ 
                        ?>                    
                            <div class="StatusUpdate">
                                <h2>Ärende: <?=$row['matters']?></h2>
                                <h2>Status: <?=$row['status']?></h2>
                                Av: <?=$row['rapport']?><br>
                                Kontakt: <?=$row['contact']?><br>
                                Skapad: <?=$row['created']?><br>
                                Senast uppdaerad: <?=$row['update']?><br>
                                <h2>Beskrivning:</h2> <?=$row['beskrivning']?>
                                <div class="right">                                        
                                    <button onclick="Finish()">Slutför</button>
                                </div>
                            </div>       
                        <?php }
                        ?>
                    </div> 
                <?php 
                }
            }else{?>
                <div class="formbox">
                    Du har ej åtkomst
                    <button onclick="location.href='index.php'">Logga in</button>
                </div>
            <?php
            }
        }else{?>
            <div class="formbox">
                Du har ej åtkomst
                <button onclick="location.href='index.php'">Logga in</button>
            </div>
        <?php
        }
        ?>
    </div>    
</body>
</html>

<script>

</script>