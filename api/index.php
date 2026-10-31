<?php

$page = $_GET['page'] ?? 'index.php';

$allowedPages = [
    'index.php',
    'checklogin.php',
    'mainpage.php',
    'L-accounts.php',
    'L-students.php',
    'L-Employees.php',
    'L-attendance.php',
    'L-course.php',
    'L-enquiry.php',
    'L-event.php',
    'L-finance.php',
    'L-interview.php'
];

if (!in_array($page, $allowedPages, true)) {
    http_response_code(404);
    exit('Page not found');
}

$file = __DIR__ . '/../' . $page;

if (!is_file($file)) {
    http_response_code(404);
    exit('Page not found');
}

require $file;
