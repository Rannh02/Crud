<?php
require_once 'Student.php';

$student = new Student();
$student = $student->readAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|View Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="container mt-4">
    <h2></h2>Student List</h2>
    <a href="create.php" class="btn btn-success mb-3">Add Student</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($student as $student): ?>
            <tr>
                <td><?=$student['id']; ?></td>
                <td><?=$student['first_name']; ?></td>
                <td><?=$student['email']; ?></td>
                <td>
                    <a href="update.php?id=<?= $student['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $student['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>