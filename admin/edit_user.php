<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "user_management_db");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a user ID is provided via POST
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Retrieve user data from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Update user data in the database
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' WHERE id = $user_id";

    if (mysqli_query($connection, $query)) {
        echo "User updated successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    // If no user ID is provided, display the modification form
    echo file_get_contents('modify_user.php');
}

// Close the database connection
mysqli_close($connection);
?>
