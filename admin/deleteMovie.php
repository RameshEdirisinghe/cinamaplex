<!DOCTYPE html>
<html>
<head>
    <title>Delete Movie</title>
</head>
<body>
    <h1>Delete Movie</h1>
    <form action="deleteMovie.php" method="POST">
        <label for="movie_id">Select a movie to delete:</label>
        <select name="movie_id" required>
            <option value="">Select Movie</option>
            <?php
            // Establish a MySQL connection
            $connection = mysqli_connect("localhost", "root", "", "cinemaplex2");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch movies from the database and populate the dropdown
            $result = mysqli_query($connection, "SELECT MovieID, name FROM movies");
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value= "<?php echo $row['MovieID']; ?>"><?php echo $row['name']; ?></option>
            <?php }

            ?>
        </select><br>
        <input type="submit" value="Delete Movie">
    </form>

    <?php
    // Check if a movie ID is provided via POST
    if (isset($_POST['movie_id'])) {
        // Get the selected movie ID from the form
        $movie_id = $_POST['movie_id'];

        // Delete the movie from the database
        $query = "DELETE FROM movies WHERE MovieID = '$movie_id'";

        if (mysqli_query($connection, $query)) {
            // Delete successful
            echo "Movie deleted successfully.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_close($connection);
    }
    ?>
</body>
</html>