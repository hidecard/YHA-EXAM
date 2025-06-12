<?php
header('Content-Type: text/html; charset=UTF-8');
include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM sections WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: sections.php");
?>