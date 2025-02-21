<?php
session_start();
include 'Validate.php'; // This file should contain your database connection details
include 'Add.php';
include 'main.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user role from the database
$userRole = 'Student'; // Default role
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname); // Replace these with actual values or define them in db_connect.php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Auth FROM LogIns WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($auth);
if ($stmt->fetch()) {
    $userRole = $auth;
}
$stmt->close();
$conn->close();
?>
