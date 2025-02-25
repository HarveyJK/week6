<?php
// Start the session
session_start();
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <a class="nav-link" href="../pageDirectory/aboutme/aboutMe.php">About Me</a>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm nav-link" href="../pageDirectory/logout/logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm nav-link" href="../pageDirectory/login/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm nav-link" href="../pageDirectory/registration/registration.php">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>