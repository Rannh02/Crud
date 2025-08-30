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
    <link rel="stylesheet" href="style.css">
</head>
<body class="container mt-4">
    <h1 class="center-title">Student Attendance</h1>
    <h2 class="student-list-title">Students Lists</h2>

    
    <div class="button-group">
        <a href="create.php" class="btn btn-success mb-3">Add Student</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Date    /   Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($student as $student): ?>
            <tr>
                <td><?=isset($student['ID']) ? htmlspecialchars($student['ID']) : ''; ?></td>
                <td><?=isset($student['First_Name']) ? htmlspecialchars($student['First_Name']) : ''; ?></td>
                <td><?=isset($student['Last_Name']) ? htmlspecialchars($student['Last_Name']) : ''; ?></td>
                <td><?=isset($student['Email']) ? htmlspecialchars($student['Email']) : ''; ?></td>
                <td>
                    <?php
                    if (isset($student['Time'])) {
                        $dt = $student['Time'];
                        $parts = explode(' ', $dt, 2);
                        if (count($parts) === 2) {
                            echo htmlspecialchars($parts[0] . ' / ' . $parts[1]);
                        } else {
                            echo htmlspecialchars($dt);
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php if(isset($student['ID'])): ?>
                    <a href="update.php?id=<?= $student['ID']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $student['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    <a  class="btn btn-danger btn-sm">Late</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>  
        </tbody>
    </table>
    
</body>
</html>