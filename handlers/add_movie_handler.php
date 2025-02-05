<?php
include "../database/database.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $date = $_POST['date']; 
        $showtime = $_POST['showtime']; 

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO movies (title, genre, date, showtime) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $genre, $date, $showtime);

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