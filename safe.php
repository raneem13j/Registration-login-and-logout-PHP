<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php"); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        
        <h2>You are logged in.</h2>
        <form action="logout.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>
