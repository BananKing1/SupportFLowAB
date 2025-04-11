<?php session_start(); ?>
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

    <div class="other">
    <?php 
        if(isset($_SESSION['role'])){
            if(isset($_SESSION['username'])){
                if(isset($_SESSION['name'])){
                    if(isset($_SESSION['id'])){
                        $xrole = $_SESSION['role'];
                        $xid = $_SESSION['id'];
                        $xname = $_SESSION['name'];
                        $xusername = $_SESSION['username'];

                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db="supportflowab";

                        $conn=mysqli_connect($host, $user, $pass, $db);

                        $sql="SELECT * FROM tblmatters WHERE status='open' OR status='ongoing' ORDER BY created DESC";
                        $result = mysqli_query($conn, $sql);

                        if(intval($xrole) >= 10){ ?>
                        <div class="cube">
                            <img src="Bilder/Icons/user.png" alt="user">
                        <?php 
                        echo "<h2>Din username: ". $xusername."</h2>";
                        echo "<h2><br> Ditt namn: ".$xname."</h2>";

                        if(intval($xrole)==100){
                            $rolename="Chef";
                        }else{
                            $rolename="Underarbetare";
                        }
                
                        echo "<h2><br> Din position: ".$rolename."</h2>";

                        ?>
                            <br><br><h2>Skapa användare</h2>
                            <form action="Profile.php" method="post" id="frmLogin">
                                <?php
                                if($xrole==100){ ?>
                                    <input type="text" name="username" placeholder="Användarnamn">
                                    <input type="text" name="password" placeholder="Lösenord">
                                    <input type="text" name="name" placeholder="Namn">
                                    <select name="role">
                                        <option value="100">Admin</option>
                                        <option value="10">Underarbetare</option>
                                    </select>
                                    <input type="submit" name="btnCreateUser" id="btnLogout" value="Skapa användare">
                            </form>
                                <?php
                                }
                                ?>
                            <br>
                            <form action="Profile.php" method="post" id="frmLogin">
                                <input type="submit" name="btnLogout" id="btnLogout" value="Logga Ut">
                            </form>
                        <?php
                        if(isset($_POST['btnCreateUser'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $name = $_POST['name'];
                            $role = $_POST['role'];
    
                            $sql = "INSERT INTO tbluser(username, name, role, password) VALUES ('$username','$password','$name','$role')";
                            $result = mysqli_query($conn, $sql);
                        }

                        if(isset($_POST['btnLogout'])){
                            session_start();
                            $_SESSION['id']="";
                            $_SESSION['role']="";
                            $_SESSION['name']="";   
                        session_destroy();
                        header("Location:index.php"); 
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
    </div>
</body>
</html>
