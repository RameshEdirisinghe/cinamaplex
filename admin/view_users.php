<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
    <style>
        /* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #4caf50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
</style>
<body>
</body>
</html>
<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve all users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Users List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>userID</th><th>firstName</th><th>lastName</th><th>contact</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['userID']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['contact']}</td><td>{$row['gender']}</td><td>{$row['email']}</td><td>{$row['password']}</td><td>{$row['registrationDate']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No users found.";
}

// Close the database connection
mysqli_close($connection);
?>
