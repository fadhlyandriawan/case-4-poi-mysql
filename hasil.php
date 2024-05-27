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
    $pois = $result->fetch_all(MYSQLI_ASSOC);
}


$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POI Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">POI Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Latitude Coordinate</th>
                    <th>Longitude Coordinate</th>
                    <th>Name Location</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Category</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pois as $poi): ?>
                    <tr>
                        <td><?= $poi['id'] ?></td>
                        <td><?= $poi['latitude'] ?></td>
                        <td><?= $poi['longitude'] ?></td>
                        <td><?= $poi['name'] ?></td>
                        <td><?= $poi['description'] ?></td>
                        <td><?= $poi['address'] ?></td>
                        <td><?= $poi['category'] ?></td>
                        <td><?= $poi['rating'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
