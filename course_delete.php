<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: courses.php");
?>