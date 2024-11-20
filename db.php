<?php
session_start();
$servername = "semtexwilli07.lima-db.de";
$username = "USER421961_ffad";
$password = "Bertel2001#*";
$dbname = "db_421961_10";

// Verbindung erstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>