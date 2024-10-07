<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a user ID is provided via POST
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Delete the user from the database
    $query = "DELETE FROM users WHERE id = $user_id";

    if (mysqli_query($connection, $query)) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    // If no user ID is provided, display the deletion form
    echo file_get_contents('delete_user.php');
}

// Close the database connection
mysqli_close($connection);
?>
