<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
</head>
<body>
    <div class="h1"><h1>Add User</h1></div>
    <form action="add_user.php" method="POST">
        <label for="firstName"><b>First Name</b></label><br>
        <input type="text" placeholder="Enter First Name" name="firstName" required><br><br>

        <label for="lastName"><b>Last Name</b></label><br>
        <input type="text" placeholder="Enter Last Name" name="lastName" required><br><br>
    
        <label for="contact"><b>Contact Number </b></label><br>
        <input type="number" placeholder="Enter Contact Number" name="contact" required><br><br>
    
        <label for="gender"><b>Gender</b></label><br>
        <input type="text" placeholder="Gender" name="gender" required><br><br>
    
        <label for="email"><b>Email</b></label><br>
        <input type="email" placeholder="Enter Email" name="email" required><br><br>

        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" required><br><br>
        <label>
        <input type="submit"  name="submit" value="Add User">
    </form>
</body>
</html>

<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "1234", "cinemaplex2");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert user data into the database
$query = "INSERT INTO users (firstName,lastName,contact,gender,email,password) VALUES ('$first_name', '$last_name',' $contact','$gender','$email', '$password')";

if (mysqli_query($connection, $query)) {
    echo "User added successfully.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
}
// Close the database connection
mysqli_close($connection);
?>
