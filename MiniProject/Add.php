<?php

session_start();
// Database connection parameters
$servername = "localhost"; // Replace with your server name if different
$username = "sahithya"; // Replace with your database username
$password = "iiits123"; // Replace with your database password
$dbname = "ClassRoomBooking"; // Ensure this matches your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $password = htmlspecialchars($_POST['Password']);
    $auth = htmlspecialchars($_POST['Auth']);
    
    // Hash the password for security
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO LogIns (Email,Name,Password,Auth) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $name, $password, $auth);

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "<p>Account created successfully!</p>";
        echo "Welcome, " . htmlspecialchars($name) . "!";
        echo "<script>
        setTimeout(function(){
            window.location.href = 'main.php';
        }, 2000); // 2000 milliseconds = 2 seconds
      </script>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
