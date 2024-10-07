<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = md5($_POST['password']);
$gender = $_POST['gender'];



// Insert user data into the database
$query = "INSERT INTO users (firstName, lastName, contact, gender, email, password) VALUES ('$firstname', '$lastname','$contact','$gender','$email', '$password')";

if (mysqli_query($connection, $query)) {
    header("Location:login.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
}else{
    header("Location:register.html");
}

// Close the database connection
mysqli_close($connection);
?>