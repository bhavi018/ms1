<?php
include 'dbconnection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the DELETE statement
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Redirect to index.php after successful deletion
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Display error message
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request: No ID provided.";
}
?>
