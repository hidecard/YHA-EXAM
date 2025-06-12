<?php
header('Content-Type: text/html; charset=UTF-8');
include 'db.php';

// Get path from query parameter or REQUEST_URI
$path = isset($_GET['path']) ? parse_url($_GET['path'], PHP_URL_PATH) : parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = rtrim(strtolower($path), '/'); // Normalize: remove trailing slash, lowercase
$path = $path === '' ? '/' : $path;

switch (true) {
    case $path === '/' || $path === '/index.php':
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>YHA Student Management System</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { background-color: #f8f9fa; }
                .navbar-brand { font-weight: bold; }
                .container { margin-top: 20px; }
            </style>
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">YHA Training</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
                            <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
                            <li class="nav-item"><a class="nav-link" href="/sections">Sections</a></li>
                            <li class="nav-item"><a class="nav-link" href="/students">Students</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <h1 class="mt-4">YHA Computer Training Center</h1>
                <p>Welcome to the student management system. Use the navigation bar to manage course categories, courses, sections, and students.</p>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
        break;
    case $path === '/categories':
        include 'categories.php';
        break;
    case $path === '/courses':
        include 'courses.php';
        break;
    case $path === '/sections':
        include 'sections.php';
        break;
    case $path === '/students':
        include 'students.php';
        break;
    case $path === '/category_add':
        include 'category_add.php';
        break;
    case strpos($path, '/category_delete') === 0:
        include 'category_delete.php';
        break;
    case strpos($path, '/category_edit') === 0:
        include 'category_edit.php';
        break;
    case $path === '/course_add':
        include 'course_add.php';
        break;
    case strpos($path, '/course_delete') === 0:
        include 'course_delete.php';
        break;
    case strpos($path, '/course_edit') === 0:
        include 'course_edit.php';
        break;
    case $path === '/section_add':
        include 'section_add.php';
        break;
    case strpos($path, '/section_delete') === 0:
        include 'section_delete.php';
        break;
    case strpos($path, '/section_edit') === 0:
        include 'section_edit.php';
        break;
    case $path === '/student_add':
        include 'student_add.php';
        break;
    case strpos($path, '/student_delete') === 0:
        include 'student_delete.php';
        break;
    case strpos($path, '/student_edit') === 0:
        include 'student_edit.php';
        break;
    default:
        http_response_code(404);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 - Page Not Found</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container">
                <h1 class="mt-4">404 - Page Not Found</h1>
                <p>The requested page does not exist. <a href="/">Return to Home</a></p>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
        break;
}
?>