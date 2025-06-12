<?php
include 'db.php';
$courses = $conn->query("SELECT * FROM courses");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $section_id = $_POST['section_id'];
    $stmt = $conn->prepare("INSERT INTO sections (course_id, section_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $course_id, $section_id);
    $stmt->execute();
    $stmt->close();
    header("Location: sections.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="mt-4">Add Section</h2>
        <form method="POST" class="col-md-6">
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" id="course_id" name="course_id" required>
                    <?php while ($course = $courses->fetch_assoc()): ?>
                        <option value="<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="section_id" class="form-label">Section ID</label>
                <input type="number" class="form-control" id="section_id" name="section_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Section</button>
            <a href="sections.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>