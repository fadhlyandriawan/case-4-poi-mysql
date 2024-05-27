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
    $id = $_POST['poiId'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $rating = $_POST['rating'];

    $sql = "UPDATE poi1 SET latitude='$latitude', longitude='$longitude', name='$name', description='$description', address='$address', category='$category', rating='$rating' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $response = [
            'id' => $id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'name' => $name
        ];
        echo json_encode($response);
    } else {
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();