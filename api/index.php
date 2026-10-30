<?php

$requestUri = $_SERVER['HTTP_X_INVOKE_PATH']
    ?? $_SERVER['REQUEST_URI']
    ?? '';

$requestPath = parse_url($requestUri, PHP_URL_PATH);

$page = basename($requestPath);

$rootFile = dirname(__DIR__) . '/' . $page;

if (
    !preg_match('/^[a-zA-Z0-9_-]+\.php$/', $page) ||
    !is_file($rootFile)
) {
    http_response_code(404);
    exit('Page not found: ' . htmlspecialchars($page));
}

require $rootFile;
