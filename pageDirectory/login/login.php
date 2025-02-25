<!DOCTYPE html> # to define the document type
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> # sets the general size of page to match device
    <title>About Me</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> # to link bootstrap css
</head>
<body>
<?php include 'moduleDirectory/navigation.php'; ?>

<div class="container">
    <h1 class="mt-5">Login Below</h1>
    <form action="login_process.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
    </form>
</div>

<?php include '../../moduleDirectory/footer.php'; ?>
</body>
</html>