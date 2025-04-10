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
            <img src="Bilder/Icons/home.png" alt="home" onclick="location.href='Index.php'">
            <img src="Bilder/Icons/bar-chart.png" alt="bar-chart" onclick="location.href='Charts.php'">

            <div class="filler"></div>

            <img src="Bilder/Icons/notification.png" alt="notification">
            <img src="Bilder/Icons/user.png" alt="user" onclick="location.href='Profile.php'">
        </div>
    </header>



    <div class="rest">
    <div class="content">
    <!-- If someone tries to log in -->
    <?php
        if(isset($_POST['btnLogin'])){
            $username=$_POST['username']; //Gotta make variable for the SQL
            $password=md5($_POST['password']);
            $strQuery="SELECT * FROM tbluser WHERE username='$username' AND password='$password';";  
            if($result=mysqli_query($conn,$strQuery)){ //Was it possible to question the database for this?
                if(!mysqli_num_rows($result)==1){   //It was, now check if it didn't was just one row
                   ?>
                    <div class="formbox">
                        Inte inloggad!<br>
                        <button onclick="location.href='Index.php'">Försök igen</button>
                    </div>
                   <?php
                   $_SESSION['id']="";
                   $_SESSION['role']="";
                   $_SESSION['name']="";                   
                }else{  //You made it! you are authorized!
                    $raden=mysqli_fetch_assoc($result);   //Get the row with data
                    echo "Välkommen ".($raden['username']); //use this to print name
                    
                    
                    
                    ?>
                        <br><br>Kritisk prioritering:
                        <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE (status='open' OR status='ongoing') AND priority='critical' ORDER BY created DESC";
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
                                        <button onclick="Finish()">Påbörja</button>
                                    </div>
                                </div>
                            <?php }
                        ?>
                        </div>


                        <br>Hög prioritering:
                        <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE (status='open' OR status='ongoing') AND priority='high' ORDER BY created DESC";
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
                                        <button onclick="Finish()">Slutföra</button>
                                    </div>
                                </div>
                            <?php }
                        ?>
                        </div>


                        <br>Medium prioritering:
                        <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE (status='open' OR status='ongoing') AND priority='medium' ORDER BY created DESC";
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
                                        <button onclick="Finish()">Slutföra</button>
                                    </div>
                                </div>
                            <?php }
                        ?>
                        </div>


                        <br>Låg prioritering:
                        <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE (status='open' OR status='ongoing') AND priority='low' ORDER BY created DESC";
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
                                        <button onclick="Finish()">Slutföra</button>
                                    </div>
                                </div>
                            <?php }
                        ?>
                        </div>   
                    
                    
                    <?php
                    $_SESSION['id']=$raden['id'];
                    $_SESSION['role']=$raden['role'];
                    $_SESSION['name']=$raden['name'];
                    //$skrivutvariabeln=$_SESSION['name'];
                    echo "<br><div class='showname'>".$_SESSION['name']."</div><br>";
                    if(intval($_SESSION['5ddf'])==100){
                        echo "Ohhh, admin!";
                    }
                }
            }   
        }else{  //else Show form   ?>
        <div class="formbox">
            <form action="Index.php" method="post" id="frmLogin">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="password"><br>
                <input type="submit" name="btnLogin" id="btnLogin" value="Login">
            </form>
        </div>
        <?php }   //Who dis? New phone ?>
    </div>   
    </div>

    
</body>
</html>
