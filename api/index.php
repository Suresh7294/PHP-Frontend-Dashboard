
<?php
//require __DIR__ . '/../index.php';

// Get the requested URL
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Extract the PHP filename
$page = basename($requestPath);

// Allow only PHP files from the project root
if (
    !preg_match('/^[a-zA-Z0-9_-]+\.php$/', $page) ||
    !is_file(__DIR__ . '/../' . $page)
) {
    http_response_code(404);
    exit('Page not found');
}

// Execute the requested PHP page
require __DIR__ . '/../' . $page;
