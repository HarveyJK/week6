<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include 'moduleDirectory/navigation.php'; ?>

<body>
<div class="container">
    <p class="lead">This is a protected page that you must be logged in to view.</p>
    <p>Please take care of the employee cat.</p>
    <img src="https://media.tenor.com/EFDwfjT2GuQAAAAM/spinning-cat.gif" alt="Spinning Cat GIF" class="img-fluid">
</div>
<?php include '../../moduleDirectory/footer.php'; ?>

</body>
</html>