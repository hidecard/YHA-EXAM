<?php
header('Content-Type: text/html; charset=UTF-8'); // Ensure HTML output
include 'db.php';

// Simple routing based on URL path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($path) {
    case '/':
    case '/index.php':
        // Homepage content
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
                    <a class="navbar-brand" href="index.php">YHA Training</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="categories.php">Categories</a></li>
                            <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
                            <li class="nav-item"><a class="nav-link" href="sections.php">Sections</a></li>
                            <li class="nav-item"><a class="nav-link" href="students.php">Students</a></li>
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
    case '/categories':
        include 'categories.php';
        break;
    case '/courses':
        include 'courses.php';
        break;
    case '/sections':
        include 'sections.php';
        break;
    case '/students':
        include 'students.php';
        break;
    case '/category_add':
        include 'category_add.php';
        break;
    case '/category_delete':
        include 'category_delete.php';
        break;
    case '/category_edit':
        include 'category_edit.php';
        break;
    case '/course_add':
        include 'course_add.php';
        break;
    case '/course_delete':
        include 'course_delete.php';
        break;
    case '/course_edit':
        include 'course_edit.php';
        break;
    case '/section_add':
        include 'section_add.php';
        break;
    case '/section_delete':
        include 'section_delete.php';
        break;
    case '/section_edit':
        include 'section_edit.php';
        break;
    case '/student_add':
        include 'student_add.php';
        break;
    case '/student_delete':
        include 'student_delete.php';
        break;
    case '/student_edit':
        include 'student_edit.php';
        break;
    default:
        // 404 Page
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
                <p>The requested page does not exist. <a href="index.php">Return to Home</a></p>
            </div>
        </body>
        </html>
        <?php
        break;
}
?>