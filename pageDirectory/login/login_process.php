<?php
// Start the session
session_start();

// Database connection
$dbname = 'employee_logins.db';

// Create (connect to) SQLite database
$conn = new SQLite3($dbname);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials are valid
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    if ($row && password_verify($password, $row['password'])) {
        // Set session variables
        $_SESSION['username'] = $username;
        // Redirect to a protected page
        header("Location: protected_page.php");
    } else {
        // Invalid credentials, redirect back to the login page with an error
        header("Location: login.php?error=invalid_credentials");
    }
} else {
    // If the form is not submitted, redirect to the login page
    header("Location: login.php");
}

$conn->close();
exit();
?>