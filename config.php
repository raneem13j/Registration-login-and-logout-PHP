<?php 

// Database credentials
$dbHost = 'localhost'; // Change to your MySQL host if different
$dbName = 'useraccounts';
$dbUser = 'root';
$dbPass = '12345';

// Establish a database connection
try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}



?>