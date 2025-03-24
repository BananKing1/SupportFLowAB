<!DOCTYPE html>

<?php
$server = "localhost";
$user = "root";
$pass = "";

$conn=mysqli_connect($server, $user, $pass, "techassistab");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tblpage(username, password) VALUES ('$username', '$password')";
    $result = msqli_query($conn, $sql);
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM tblpage WHERE id=$id";
    $result = mysqli_query($conn, $sql);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Rubrik</h1>

    <form action="test.php" method="post">
        <input type="text" name="username" placeholder="Användarnamn">
        <input type="password" name="password" placeholder="Lösenord">
        <input type="submit" name="submit" value="Skicka">
    </form>


<?php 
$sql = "SELECT * FROM tblpage ORDER BY username ASC";
$result = mysqli_query($conn, $sql);
while($rad=mysqli_fetch_assoc($result)){ ?>
    <p> 
        <b>Användarnamn:</b> &nbsp;<?=$rad['username']?><br>
        <b>Lösenord:</b>&nbsp;<?=$rad['password']?><br>
        <a href="test.php?id=<?=$rad['id']?>">Delete"></a>
    </p>
<?php }
?>

</body>
</html>