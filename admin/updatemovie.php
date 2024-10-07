<!DOCTYPE html>
<html>
<head>
    <title>Update Movie</title>
    <style>
        /* Your CSS styles remain unchanged */
    </style>
</head>
<body>
    <h1>Update Movie</h1>
    <form action="updatemovie.php" method="POST" enctype="multipart/form-data">
        <label for="movie_id">Select a Movie:</label>
        <select name="movie_id" required>
            <option value="">Select Movie</option>
            <?php
            // Establish a MySQL connection
            $connection = mysqli_connect("localhost", "root", "", "cinemaplex");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch movies from the database and populate the dropdown
            $result = mysqli_query($connection, "SELECT MovieID, name FROM movies");
            while ($row = mysqli_fetch_assoc($result)) { 
                echo "<option value='" . $row['MovieID'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select><br>
        <label for="name"> Movie Name </label>
        <input type="text" name="movie_name" required><br><br>

        <label for="genre"> Genre</label>
        <input type="text" name="genre" required><br><br>

        <label for="duration">Duration</label>
        <input type="text" name="duration" required><br><br>

        <label for="year">Release Year</label>
        <input type="text" name="r_year" required><br><br>

        <label for="rating">Rating</label>
        <input type="text" name="rating" required><br><br>

        <label for="poster_URL">Poster URL:</label>
        <input type="text" name="poster_URL" required><br><br>

        <label for="description">Movie description:</label>
        <input type="text" name="movie_descrip" required><br><br>

        <label for="price">Movie Price:</label>
        <input type="number" name="price" required><br><br>
        
        <input type="submit" value="Edit Movie" style="margin-left:40%;margin-top: 5%;padding: 2%;">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish a MySQL connection
        $connection = mysqli_connect("localhost", "root", "1234", "cinemaplex2");

        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve form data
        $movieId = mysqli_real_escape_string($connection, $_POST['movie_id']);
        $movieName = mysqli_real_escape_string($connection, $_POST['movie_name']);
        $genre = mysqli_real_escape_string($connection, $_POST['genre']);
        $duration = mysqli_real_escape_string($connection, $_POST['duration']);
        $releaseYear = mysqli_real_escape_string($connection, $_POST['r_year']);
        $rating = mysqli_real_escape_string($connection, $_POST['rating']);
        $posterURL = mysqli_real_escape_string($connection, $_POST['posterURL']);
        $description = mysqli_real_escape_string($connection, $_POST['movie_descrip']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);

        // Update the movie details in the database
        $updateQuery = "UPDATE movies SET 
                        name='$movieName', 
                        genre='$genre', 
                        duration='$duration', 
                        rleaseyear='$releaseYear', 
                        rating='$rating', 
                        posterURL='$posterURL', 
                        description='$description', 
                        price='$price' 
                        WHERE MovieID='$movieId'";

        if (mysqli_query($connection, $updateQuery)) {
            echo "Movie updated successfully";
        } else {
            echo "Error updating movie: " . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_close($connection);
    }
    ?>
</body>
</html>
