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
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        // Redirect back to the registration page with an error
        header("Location: registration.php?error=password_mismatch");
        exit();
    }

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result->fetchArray()) {
        // Redirect back to the registration page with an error
        header("Location: registration.php?error=username_taken");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        // Redirect to the login page
        header("Location: login.php?success=registration_complete");
    } else {
        // Redirect back to the registration page with an error
        header("Location: registration.php?error=registration_failed");
    }
} else {
    // If the form is not submitted, redirect to the registration page
    header("Location: registration.php");
}

$conn->close();
exit();
?>