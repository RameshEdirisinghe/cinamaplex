<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
</head>
<body>
   <div class="h1"> <h1>Delete User</h1></div>
    <form action="remove_user.php" method="POST">
        <label for="user_id">Select a User to Delete:</label>
        <select name="user_id" required>
            <option value="">Select User</option>
            
            <?php
            // Establish a MySQL connection
            $connection = mysqli_connect("localhost", "root", "", "cinemaplex2");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the list of users from the database
            $query = "SELECT id, first_name, last_name FROM users";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>{$row['userID']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['contact']}</td><td>{$row['gender']}</td><td>{$row['email']}</td><td>{$row['password']}</td><td>{$row['registrationDate']}</td></tr>";
                }
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
            
        </select><br>
        
        <input type="submit" value="Delete User">
    </form>
</body>
</html>
