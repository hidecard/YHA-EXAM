<?php
include 'db.php';
header('Content-Type: text/html; charset=UTF-8');
$categories = $conn->query("SELECT * FROM course_categories");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $normal_price = $_POST['normal_price'];
    $special_price = $_POST['special_price'];
    $duration = $_POST['duration'];
    $category_id = $_POST['category_id'];
    $stmt = $conn->prepare("INSERT INTO courses (name, description, normal_price, special_price, duration, category_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddii", $name, $description, $normal_price, $special_price, $duration, $category_id);
    $stmt->execute();
    $stmt->close();
    header("Location: courses.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="mt-4">Add Course</h2>
        <form method="POST" class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="normal_price" class="form-label">Normal Price (MMK)</label>
                <input type="number" class="form-control" id="normal_price" name="normal_price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="special_price" class="form-label">Special Price (MMK)</label>
                <input type="number" class="form-control" id="special_price" name="special_price" step="0.01">
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (hours)</label>
                <input type="number" class="form-control" id="duration" name="duration" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <?php while ($cat = $categories->fetch_assoc()): ?>
                        <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
            <a href="courses.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>