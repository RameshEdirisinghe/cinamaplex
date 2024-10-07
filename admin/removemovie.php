<?php


// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a movie ID is provided via POST
if (isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];



    // Delete the movie from the database
    $query = "DELETE FROM movies WHERE MovieID = $movie_id";

    if (mysqli_query($connection, $query)) {
        // Delete successful, also remove the movie image file
       
        echo "Movie deleted successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    // If no movie ID is provided, display the deletion form
    echo file_get_contents('delete_movies.php');
}

// Close the database connection
mysqli_close($connection);
?>
