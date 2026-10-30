<?php
/*$con = mysqli_connect("localhost", "root", "", "erp");
if ($con) {

} else {
    echo "Error in  connection";
    die("Error:" . mysqli_connect_error());
} */


$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = (int) getenv('DB_PORT');
$caCert = getenv('DB_CA_CERT');

$con = mysqli_init();

mysqli_options($con, MYSQLI_OPT_CONNECT_TIMEOUT, 10);

mysqli_options($con, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL);

if (
    !mysqli_real_connect(
        $con,
        $host,
        $user,
        $password,
        $database,
        $port,
        NULL,
        MYSQLI_CLIENT_SSL
    )
) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Database connection failed.");
}
?>