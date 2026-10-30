<?php
session_start();

$_SESSION['test_value'] = 'Session working';

echo "Session ID: " . session_id() . "<br>";
echo "Session value: " . $_SESSION['test_value'] . "<br>";
echo "PHP auto prepend: " . ini_get('auto_prepend_file');
