
<?php

mysqli_report(MYSQLI_REPORT_OFF);

// Database environment variables
$host = trim(getenv('DB_HOST') ?: '');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = (int) getenv('DB_PORT');
$caCert = getenv('DB_CA_CERT');

// Check configuration
if ($host === '' || !$user || !$password || !$database || !$port) {
    error_log("Missing database environment variables.");
    http_response_code(500);
    exit("Database configuration missing.");
}

// Check DNS resolution
$ip = gethostbyname($host);

if ($ip === $host) {
    error_log("Database DNS resolution failed for: " . $host);
    http_response_code(500);
    exit("Database hostname could not be resolved.");
}

// Initialize MySQL connection
$con = mysqli_init();

mysqli_options($con, MYSQLI_OPT_CONNECT_TIMEOUT, 15);

// Connect to Aiven MySQL using SSL
if (!mysqli_real_connect(
    $con,
    $host,
    $user,
    $password,
    $database,
    $port,
    null,
    MYSQLI_CLIENT_SSL
)) {
    error_log("Database connection failed: " . mysqli_connect_error());
    http_response_code(500);
    exit("Database connection failed.");
}

?>
