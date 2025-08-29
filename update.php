<?php
require_once 'Student.php';
$student = new Student();

$id = $_GET['id'] ?? null;
$data = $student->getById($id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];

    if($student->update($id, $first_name, $email)){
        echo "Student updated successfully.";
        header("Location: index.php");
    } else {
        echo "Failed to update student.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="container mt-4">
    <h2>Update Student</h2>
    <form method="POST">    
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" value = "<?=$data['first_name'];?>"  name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value = "<?=$data['email'];?>" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </form>
    
</body>
</html>