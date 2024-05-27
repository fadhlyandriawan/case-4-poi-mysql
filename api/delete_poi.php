<?php
$servername = "localhost";
$username = "root";
$password = "rahasia";
$dbname = "poi1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM poi1 WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // POI exists, delete it
        $stmt = $conn->prepare("DELETE FROM poi1 WHERE id=?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "POI deleted successfully";
        } else {
            http_response_code(500);
            echo "Error: " . $stmt->error;
        }
    } else {
        http_response_code(404);
        echo "POI not found";
    }
}

$conn->close();