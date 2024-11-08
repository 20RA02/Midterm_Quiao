<?php include 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Register</h1>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Register">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Insert user into the database
        $stmt = $pdo->prepare("INSERT INTO Users (Username, Password) VALUES (?, ?)");
        if ($stmt->execute([$username, $password])) {
            echo "<p>User registered successfully!</p>";
        } else {
            echo "<p>Error registering user.</p>";
        }
    }
    ?>
    <a href="login.php">Already have an account? Login here.</a>
</body>
</html>