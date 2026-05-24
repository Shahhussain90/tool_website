<?php
// Change this depending on environment
define('BASE_URL', 'http://localhost/all_tools/');



// Database connection settingsmysql
$con = mysqli_connect('localhost', 'root', '', 'volttools');

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}   








?>