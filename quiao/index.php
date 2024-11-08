<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to the Restaurant Management System</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <a href="add_customer.php">Add Customer</a> | 
        <a href="view_customers.php">View Customers</a> | 
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p>Please <a href="login.php">login</a> or <a href="register.php">register</a> to access the system.</p>
    <?php endif; ?>

</body>
</html>