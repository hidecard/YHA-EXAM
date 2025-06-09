<?php
include 'db.php';
$courses = $conn->query("SELECT * FROM courses");
$sections = $conn->query("SELECT * FROM sections");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $section_id = $_POST['section_id'];
    $name = $_POST['name'];
    $register_date = $_POST['register_date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $status = '1';
    $stmt = $conn->prepare("INSERT INTO students (course_id, section_id, name, register_date, email, phone, father_name, mother_name, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssssss", $course_id, $section_id, $name, $register_date, $email, $phone, $father_name, $mother_name, $status);
    $stmt->execute();
    $stmt->close();
    header("Location: students.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="mt-4">Add Student</h2>
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
                <label for="section_id" class="form-label">Section</label>
                <select class="form-select" id="section_id" name="section_id" required>
                    <?php while ($section = $sections->fetch_assoc()): ?>
                        <option value="<?php echo $section['id']; ?>">Section <?php echo htmlspecialchars($section['section_id']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="register_date" class="form-label">Register Date</label>
                <input type="date" class="form-control" id="register_date" name="register_date" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="father_name" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="father_name" name="father_name">
            </div>
            <div class="mb-3">
                <label for="mother_name" class="form-label">Mother Name</label>
                <input type="text" class="form-control" id="mother_name" name="mother_name">
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
            <a href="students.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>