<?php
include("config.php");

if (
    isset($_POST['driver']) &&
    isset($_POST['source']) &&
    isset($_POST['departure']) &&
    isset($_POST['destination']) &&
    isset($_POST['arrival']) &&
    isset($_POST['status'])
) {
    $driver = $_POST['driver'];
    $source = $_POST['source'];
    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $arrival = $_POST['arrival'];
    $status = $_POST['status'];

    $sql = "INSERT INTO bus_schedule (driver, source, departure, destination, arrival, status)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $driver, $source, $departure, $destination, $arrival, $status);

    if ($stmt->execute()) {
        echo "Inserted";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Missing data!";
}
?>
