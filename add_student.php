<?php
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    try {
        $sql = "INSERT INTO students (name, age, class) VALUES (:name, :age, :class)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':class', $class, PDO::PARAM_STR);
        $stmt->execute();

        // Redirect to index.php after successful insert
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Age:</label>
        <input type="number" name="age" required><br>
        <label>Class:</label>
        <input type="text" name="class" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
