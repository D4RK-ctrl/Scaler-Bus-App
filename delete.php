<?php
    include("config.php");

    if (isset($_POST['delete']) && isset($_POST['user_id'])) {
        $id = $_POST['user_id'];
    
        $sql = "DELETE FROM bus_schedule WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            echo "Deleted";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Invalid request";
    }
?>