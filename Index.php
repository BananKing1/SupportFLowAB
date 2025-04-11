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
            <img src="Bilder/Icons/bar-chart.png" alt="bar-chart" onclick="location.href='charts.php'">

            <div class="filler"></div>

            <img src="Bilder/Icons/user.png" alt="user" onclick="location.href='Profile.php'">
        </div>
    </header>



    <div class="other">
        <div class="content">
        <!-- If someone tries to log in -->
        <?php
            if(isset($_POST['btnLogin'])){
                $username=$_POST['username']; //Gotta make variable for the SQL
                $password=$_POST['password'];
                $strQuery="SELECT * FROM tbluser WHERE username='$username' AND password='$password';";  
                if($result=mysqli_query($conn,$strQuery)){ //Was it possible to question the database for this?
                    if(!mysqli_num_rows($result)==1){   //It was, now check if it didn't was just one row
                    ?>
                        <div class="formbox">
                            Inte inloggad!<br>
                            <button onclick="location.href='index.php'">Försök igen</button>
                        </div>
                    <?php
                    $_SESSION['id']="";
                    $_SESSION['role']="";
                    $_SESSION['name']="";  
                    $_SESSION['username'];                 
                    }else{  //You made it! you are authorized!
                        $raden=mysqli_fetch_assoc($result);   //Get the row with data
                        echo "Välkommen, ".($raden['username']); //use this to print name
                        $_SESSION['id']=$raden['id'];
                        $_SESSION['role']=$raden['role'];
                        $_SESSION['name']=$raden['name'];
                        $_SESSION['username']=$raden['username'];
                        //$skrivutvariabeln=$_SESSION['name'];
                        echo "<br>(".$_SESSION['name'].")</div><br>";
                        if(intval($_SESSION['role'])==100){
                            echo "Hej, admin!";
                            ?><br><br> <button onclick="location.href='home.php'">Gå till hem</button><?php
                        }else{
                            ?><br><br> <button onclick="location.href='home.php'">Gå till hem</button><?php
                        }
                    }
                }   
            }else{  //else Show form   ?>
            <div class="formbox">
                <form action="index.php" method="post" id="frmLogin">
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
