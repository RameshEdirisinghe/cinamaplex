<!DOCTYPE html>
<html>
<head>
    <title>Modify User</title>
</head>
<body>
    <h1>Modify User</h1>
    <form action="edit_user.php" method="POST">
        <label for="user_id">Select a User:</label>
        <select name="user_id" required>
            <option value="">Select User</option>
            
            <?php
            // Establish a MySQL connection
            $connection = mysqli_connect("localhost", "root", "", "cinemaplex");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the list of users from the database
            $query = "SELECT id, first_name, last_name FROM users";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['first_name']} {$row['last_name']}</option>";
                }
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
            
        </select><br>
        
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" value="Edit User">
    </form>
</body>
</html>
