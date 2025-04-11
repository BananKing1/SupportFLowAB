<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "supportflowab";

$conn = mysqli_connect($host, $user, $pass, $db);

$sql = "SELECT DATE(`update`) as date, COUNT(*) as completed 
FROM tblmatters 
WHERE status='complete' 
GROUP BY DATE(`update`) 
ORDER BY `update` DESC";

$result = mysqli_query($conn, $sql);

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
