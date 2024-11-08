<?php 
session_start(); 
include 'dbConfig.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Login">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Fetch user from the database
        $stmt = $pdo->prepare("SELECT * FROM Users WHERE Username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($user && password_verify($password, $user['Password'])) {
            $_SESSION['user_id'] = $user['User ID'];
            $_SESSION['username'] = $user['Username'];
            header("Location: index.php");
            exit();
        } else {
            echo "<p>Invalid username or password.</p>";
        }
    }
    ?>
    <a href="register.php">Don't have an account? Register here.</a>
</body>
</html>