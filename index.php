<?php
include 'dbconnection.php';

// Handle search query
$search = $_GET['search'] ?? '';
$sql = $search 
 ? "SELECT * FROM students WHERE name LIKE :search OR age LIKE :search OR class LIKE :search"
 : "SELECT * FROM students";

$stmt = $pdo->prepare($sql);
if ($search) {
$stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
}
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>
</head>
<body>
 <h1>Student Management System</h1>
 <a href="add_student.php">Add Student</a>
 <form method="get">
<input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by Name, Age, or Class">
 <button type="submit">Search</button>
 <a href="index.php">Clear</a>
</form>
 <table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
 <th>Class</th>
 <th>Actions</th>
</tr>
<?php if ($students): ?>
<?php foreach ($students as $student): ?>
 <tr>
 <td><?= $student['id']; ?></td>
 <td><?= htmlspecialchars($student['name']); ?></td>
 <td><?= $student['age']; ?></td>
 <td><?= htmlspecialchars($student['class']); ?></td>
<td>
 <a href="edit_student.php?id=<?= $student['id']; ?>">Edit</a>
 <a href="delete_student.php?id=<?= $student['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
 </td>
</tr>
<?php endforeach; ?>
 <?php else: ?>
 <tr>
    <td colspan="5">No students found.</td>
 </tr>
 <?php endif; ?>
 </table>
</body>
</html>

