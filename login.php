<?php 
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "cinemaplex");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sign in  Form </title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
<body>
  <div class="container">
    <div class="title">Sign In </div>
    <div class="content">
      <form action="login.php" method="post">
        <div class="user-details">
    
          <div class="input-box">
            <span class="details">Email :</span>
            <input type="text" placeholder="Enter your username" name="email" required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="submit" value="Sign In">
        </div>
        <div class="Linker"><p>Don't you have account yet? <a href="register.html">Create new</a></p></div>
      </form>
    </div>
  </div>
  <a href="home.html" class="back-to-home-button">Back to Home</a>
  <footer>
    <div class="footer">
        <div class="row">
            <a href=""><i class="fa fa-facebook" aria-hidden="true"></i> </a>
            <a href=""><i class="fa fa-instagram" aria-hidden="true"></i> </a>
            <a href=""><i class="fa fa-youtube" aria-hidden="true"></i> </a>
            <a href=""><i class="fa fa-twitter" aria-hidden="true"></i> </a>
        </div>
        <div class="row">
            <ul>
                <li> <a href="about.html">Contact us</a></li>
                <li><a href="about.html">Our Services</a></li>
                <li><a href="about.html">Privacy Policy</a></li>
                <li><a href="about.html">Terms & Conditions</a></li>
                <li><a href="Movies.html">Movies</a></li>
            </ul>
        </div>

        <div class="row">
            Cinemaplex  Copyright &copy; 2023 - All rights reserved || Designed By: Amila Pubudhu
        </div>
    </div>
</footer>
</body>
</html>
<?php
if(isset($_POST["submit"])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
  
  $results = mysqli_query($connection,$sql);
  if(mysqli_num_rows($results)>0){
    header("Location:home.html");
  }else{
    echo "<script>alert('User Name Or Password is Incorect !')</script>";
  }
  }
?>