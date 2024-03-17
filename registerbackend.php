<?php
// include db connection
include 'db/db_connection.php';

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

try {
    // Prepare SQL statement to insert data
    $stmt = $pdo->prepare("INSERT INTO users (username, password, phoneno, address) VALUES (:username, :password, :phoneno, :address)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phoneno', $phoneno);

    // Execute the statement
    $stmt->execute();

    echo "User registered successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>