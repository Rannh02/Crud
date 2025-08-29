<?php
require_once 'Student.php';
$Student = new Student();


$id = $_GET['id'] ?? null;
if ($id) {
    $Student->delete($id);
}
header('Location: index.php');
?>
