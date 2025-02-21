<?php
session_start(); // Start the session

// Database connection parameters
$servername = "localhost"; // Change to your server name
$username = "sahithya";    // Change to your database username
$password = "iiits123";    // Change to your database password
$dbname = "ClassRoomBooking"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input and sanitize it
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    
    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT Name, Password, Auth FROM LogIns WHERE Email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email); // "s" specifies that $email is a string
    $stmt->execute();
    
    // Bind the result to variables
    $stmt->bind_result($name, $stored_password, $user_role);
    $stmt->fetch();
    
    // Check if a record was found and if the password matches
    if ($name && $password === $stored_password) {
        // Password is correct, welcome the user
        
        // Store user data in session
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['user_role'] = $user_role; // Store user role in session

        //echo "Welcome, " . htmlspecialchars($name) . "!";

        // JavaScript to store the user role in local storage
        echo "<script>
            localStorage.setItem('userRole', " . json_encode($user_role) . ");
            setTimeout(function(){
                window.location.href = 'main.php'; // Redirect to the main page after 2 seconds
            }, 100); // 2000 milliseconds = 2 seconds
        </script>";
    } else {
        // Invalid email or password
        echo "Invalid email or password.";
    }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
