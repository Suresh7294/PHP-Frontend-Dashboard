<?php

echo '<pre>';
echo "REQUEST_URI: ";
var_dump($_SERVER['REQUEST_URI'] ?? null);

echo "\nSCRIPT_NAME: ";
var_dump($_SERVER['SCRIPT_NAME'] ?? null);

echo "\nQUERY_STRING: ";
var_dump($_SERVER['QUERY_STRING'] ?? null);

echo "\nALL SERVER VARIABLES:\n";

foreach ($_SERVER as $key => $value) {
    if (stripos($key, 'path') !== false || stripos($key, 'url') !== false) {
        echo $key . ' = ';
        var_dump($value);
    }
}
echo '</pre>';
