<?php session_start();?>

<!DOCTYPE html>

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

                if(intval($xrole) == 100){ ?>
                    Skapa ärenden: <br>
                    ____________________________________________________________
                    <form action="home.php" method="POST">
                        <input type="text" name="matters" placeholder="Ärenden">
                        <input type="text" name="beskrivning" placeholder="Beskrivning">
                        <select name="status">
                            <option value="open">Öppen</option>
                            <option value="ongoing">Påbörjad</option>
                            <option value="pending">Pausad</option>
                            <option value="complete">Avslutad</option>
                        </select>
                        <select name="priority">
                            <option value="critical">Kritisk</option>
                            <option value="high">Hög</option>
                            <option value="medium">Medium</option>
                            <option value="low">Låg</option>
                        </select>
                        <input type="text" name="rapport" placeholder="Rapport">
                        <input type="text" name="shared" placeholder="Dela">
                        <input type="email" name="contact" placeholder="Kontakt">
                        <input type="text" name="comment" placeholder="Kommentar">
                        <input type="submit" name="btnCreate" value="Skapa ärenden">
                    </form>
                    ____________________________________________________________
                    <?php 
                    if(isset($_POST['btnCreate'])){
                        $matters = $_POST['matters'];
                        $beskrivning = $_POST['beskrivning'];
                        $status = $_POST['status'];
                        $priority = $_POST['priority'];
                        $rapport = $_POST['rapport'];
                        $shared = $_POST['shared'];
                        $contact = $_POST['contact'];
                        $comment = $_POST['comment'];

                        $sql = "INSERT INTO tblmatters(matters, beskrivning, status, priority, rapport, shared, contact, comment) VALUES ('$matters', '$beskrivning', '$status', '$priority', '$rapport', '$shared', '$contact', '$comment')";
                        $result = mysqli_query($conn, $sql);
                    }                    
                }   
                
                if(isset($_POST['btnStart'])) {
                    $matter_id = $_POST['matter_id'];
                
                    $sql = "UPDATE tblmatters SET status='ongoing', shared=$xid, `update`=NOW() WHERE id=$matter_id";
                    $result = mysqli_query($conn, $sql);
                
                    if($result) {
                        echo "Status uppdaterad!";
                    } else {
                        echo "Fel: " . mysqli_error($conn);
                    }
                }
                
                if(intval($xrole) >= 10){ ?>
                    <br>Kritisk prioritering:
                    <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE status='open' AND priority='critical' ORDER BY created DESC";
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
                                    <form action="home.php" method="POST">
                                        <input type="hidden" name="matter_id" value="<?=$row['id']?>">
                                        <input type="submit" name="btnStart" value="Påbörja">
                                    </form>
                                </div>
                            </div>       
                        <?php }
                        ?>
                    </div> 
                    ____________________________________________________________
                    <br>Hög prioritering:                    
                    <div class="box">
                        <?php                                
                            $sql = "SELECT * FROM tblmatters WHERE status='open' AND priority='high' ORDER BY created DESC";
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
                                    <form action="home.php" method="POST">
                                        <input type="hidden" name="matter_id" value="<?=$row['id']?>">
                                        <input type="submit" name="btnStart" value="Påbörja">
                                    </form>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div> 
                    ____________________________________________________________  
                    <br>Medium prioritering:
                    <div class="box">
                        <?php                               
                        $sql = "SELECT * FROM tblmatters WHERE status='open' AND priority='medium' ORDER BY created DESC";
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
                                    <form action="home.php" method="POST">
                                        <input type="hidden" name="matter_id" value="<?=$row['id']?>">
                                        <input type="submit" name="btnStart" value="Påbörja">
                                    </form>
                                </div>
                            </div>                                                     
                        <?php }
                        ?>                                
                    </div> 
                    ____________________________________________________________ 
                    <br>Låg prioritering:
                    <div class="box">
                        <?php
                            $sql = "SELECT * FROM tblmatters WHERE status='open' AND priority='low' ORDER BY created DESC";
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
                                    <form action="home.php" method="POST">
                                        <input type="hidden" name="matter_id" value="<?=$row['id']?>">
                                        <input type="submit" name="btnStart" value="Påbörja">
                                    </form>
                                </div>                                   
                            </div>
                    <?php }
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
        }else{?>
            <div class="formbox">
                Du har ej åtkomst
                <button onclick="location.href='index.php'">Logga in</button>
            </div>
        <?php
        }
?>

<?php 

?>
    </div>
</body>
    </html>