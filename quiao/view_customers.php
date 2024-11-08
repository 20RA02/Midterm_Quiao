<?php include 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Customers List</h1>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM Customers");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['CustomerID']}</td>
                    <td>{$row['FirstName']}</td>
                    <td>{$row['LastName']}</td>
                    <td>{$row['Email']}</td>
                    <td>{$row['Phone']}</td>
                    <td>{$row['Address']}</td>
                  </tr>";
        }
        ?>
    </table>
    <a href="add_customer.php">Add New