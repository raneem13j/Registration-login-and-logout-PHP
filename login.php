<?php
include('config.php');

if (isset($_POST['login'])) {
    $userName = $_POST['userName'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM users WHERE userName = ? AND passwor = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$userName, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Login successful
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: safe.php"); // Redirect to a dashboard or homepage
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password";
    }
}
?>
