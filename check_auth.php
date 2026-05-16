<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];
$current_page = basename($_SERVER['PHP_SELF']);

// Define allowed pages for each restricted role
// Action pages (insert/delete) are restricted here as well
$teacher_pages = [
    'getTeacher.php', 'getCourse.php', 'getTeaches.php', 
    'addGrade.php', 'updateGrade.php', 'showGrades.php', 'index.php'
];

$student_pages = [
    'getStudent.php', 'getCourse.php', 'showGrades.php', 'index.php'
];

$allowed = false;
if ($role === 'admin') {
    $allowed = true;
} elseif ($role === 'teacher' && in_array($current_page, $teacher_pages)) {
    $allowed = true;
} elseif ($role === 'student' && in_array($current_page, $student_pages)) {
    $allowed = true;
}

if (!$allowed) {
    echo "<!DOCTYPE html><html><head><title>Access Denied</title><link rel='stylesheet' href='style.php'></head><body>";
    echo "<div id='wrapper'><h2>Access Denied</h2><p>Your role ({$role}) does not have permission to view or perform actions on this page.</p><br><a href='index.php' style='color:#10b981;'>Return Home</a></div>";
    echo "</body></html>";
    exit();
}
?>
