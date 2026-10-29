
<?php
header('Content-Type: text/plain');

echo "PHP version: " . PHP_VERSION . "\n";
echo "MySQLi available: " . (extension_loaded('mysqli') ? 'Yes' : 'No') . "\n";
echo "OpenSSL available: " . (extension_loaded('openssl') ? 'Yes' : 'No') . "\n";
?>
