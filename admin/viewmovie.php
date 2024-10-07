<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>
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
</head>
<body>

<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve all movies from the database
$query = "SELECT * FROM movies";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Movies List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>movieID</th><th>name</th><th>price</th><th>genre</th><th>duration</th><th>rleaseYear</th><th>rating</th><th>posterURL</th><th>description</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['MovieID']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['genre']}</td><td>{$row['duration']}</td><td>{$row['rleaseYear']}</td><td>{$row['rating']}</td><td>{$row['posterURL']}</td><td>{$row['description']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No movies found.";
}

// Close the database connection
mysqli_close($connection);
?>
</body>
</html>