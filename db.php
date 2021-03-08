<?php

$host = 'localhost';
$dbUser = 'root';
$dbPass  = '';
$dbName  = '2pg2';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
