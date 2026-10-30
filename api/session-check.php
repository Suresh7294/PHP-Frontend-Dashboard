<?php
echo "Current directory: " . getcwd() . "<br>";
echo "Script directory: " . __DIR__ . "<br>";
echo "Project root bootstrap exists: " .
     (file_exists(__DIR__ . '/../session_bootstrap.php') ? 'YES' : 'NO') . "<br>";
echo "API bootstrap exists: " .
     (file_exists(__DIR__ . '/session_bootstrap.php') ? 'YES' : 'NO') . "<br>";
echo "PHP version: " . PHP_VERSION;
