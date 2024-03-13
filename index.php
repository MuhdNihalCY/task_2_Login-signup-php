<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
    <main>
        <div class="homeContainer">
            <h1>Welcome Home.</h1>
            <a href="logout.php" class="logoutBtn">Log Out</a>
        </div>
    </main>
</body>
</html>