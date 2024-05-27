<?php
$servername = "localhost";
$username = "root";
$password = "rahasia";
$dbname = "poi1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM poi1";
$result = $conn->query($sql);

$pois = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pois[] = $row;
    }
}

echo json_encode($pois);

$conn->close();

$pois = [];
if ($result->num_rows > 0) {
    $pois = $result->fetch_all(MYSQLI_ASSOC);
}
