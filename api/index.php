<?php

$page = $_GET['page'] ?? '';
$page = basename($page);

$rootFile = dirname(__DIR__) . '/' . $page;

if (
    !preg_match('/^[a-zA-Z0-9_-]+\.php$/', $page) ||
    !is_file($rootFile)
) {
    http_response_code(404);
    exit('Page not found: ' . htmlspecialchars($page));
}

require $rootFile;
