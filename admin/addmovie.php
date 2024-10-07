<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex2");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input from the form
if(isset($_POST['submit'])){
$name = $_POST['movie_name'];
$price = $_POST['price'];
$genre = $_POST['genre'];
$duration = $_POST['duration'];
$rleaseYear = $_POST['r_year'];
$rating = $_POST['rating'];
$posterURL = $_POST['poster_URL'];
$description = $_POST['movie_descrip'];



// Insert movie data into the database
$query = "INSERT INTO movies ( name, price , genre, duration ,  rleaseYear, rating, posterURL, description) VALUES ('$name', '$price', '$genre', '$duration', '$rleaseYear', '$rating' , '$posterURL', '$description')";

if (mysqli_query($connection, $query)) {
    echo "Movie added successfully.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
}else{
    header("Location:addmovie.html");
}

// Close the database connection
mysqli_close($connection);
?>


