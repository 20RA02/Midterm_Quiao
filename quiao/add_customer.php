<?php include 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Customer</h1>
    <form action="add_customer.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>
        
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        
        <input type="submit" value="Add Customer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Insert customer into the database
        $stmt = $pdo->prepare("INSERT INTO Customers (FirstName, LastName, Email, Phone, Address) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$first_name, $last_name, $email, $phone, $address])) {
            echo "<p>Customer added successfully!</p>";
        } else {
            echo "<p>Error adding customer.</p>";
        }
    }
    ?>
    <a href="view_customers.php">View Customers</a>
</body>
</html>