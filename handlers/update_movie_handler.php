<?php

include "../database/database.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $date = $_POST['date'];
        $showtime = $_POST['showtime']; // This will be in HH:MM format
        $status = $_POST['status'];
        $id = $_POST['id'];

        // Debug output to check the posted values
        var_dump($_POST);

        // Prepare the UPDATE statement
        $stmt = $conn->prepare("UPDATE movies SET title = ?, genre = ?, date = ?, showtime = ?, status = ? WHERE id = ?");
        $stmt->bind_param("ssssis", $title, $genre, $date, $showtime, $status, $id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Operation failed: " . $stmt->error;
        }
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>