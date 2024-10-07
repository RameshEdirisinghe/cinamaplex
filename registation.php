<?php
include("header.php");
?>

<?php
session_start();
include("config_reg.php")
?>


<section style="min-height: 100px;">
</section>
<section style="min-height: 800px;">


 


<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            background: url(../cinemaplex/images/hole.jpg);
            background-size: cover;
    font-family:sans-serif;
    width: 100%;
    height: 100vh;

}


.signup {
    max-width: 380px;
    margin: 0 auto;
    padding: 20px;
    background: #f1f1f1;
    border: 1px solid #ddd;
    border-radius: 5px;
}
.container h1{
    text-align: center;
    color: black;
    
}
h4{
    text-align: center;
    padding-top: 15px;
    color: black;
}

form {
    width: 300px;
    margin-left: 20px;
    
   
   
}

form label{
    display: flex;
    flex-direction: column;
    margin-top: 20px;
    font-size: 18px;
    color: black;
}

form input{
    width: 100%;
    padding: 7px;
    border: none;
    border: 1px solid gray;
    border-radius: 6px;
    outline: none;
}

input[type="submit"]{
    width: 300px;
    height: 35px;
    margin-top: 20px;
    border: none;
    background-color: #ff7200;
    color: white;
    font-size: 18px;
    cursor: pointer;
}

input[type="submit"]:hover{
    color: #f1f1f1;
    background-color: darkorange;
}

.para { 
    text-align: center;
    padding-top: 20px;
    font-size: 15px;
    color: black;
    
}







    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>User Registation</title>
</head>
<body>

<div>
    <?php
    if(isset($_POST['create'])){
        $firstname   = $_POST['firstname'];
        $lastname    = $_POST['lastname'];
        $email       = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password    = md5($_POST['password']);

        $sql= "INSERT INTO users(firstname,lastname,email,phonenumber,password) VALUES(?,?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
        if($result){
           header("Location:login.php");
        }else{
            echo "<script type='text/javascript'> alert('fail registation..')</script>";
        }
    }

    ?>
</div>

<div class="signup">
    <form action="registation.php" method="post">
        
        <div class="container">
                          
                    <h1>Registation</h1><br>
                    <h4><p>fil up the form with correct values.</p></h4>

                    <label for="firstname"> <b>First Name</b></label>
                    <input type="text" name="firstname" required>

                    <label for="lastname"> <b>Last Name</b></label>
                    <input type="text" name="lastname" required>

                    <label for="email"> <b>Email Address</b></label>
                    <input type="email" name="email" required>

                    <label for="phonenumber"> <b>Phone Number </b></label>
                    <input type="number" name="phonenumber" required>

                    <label for="password"> <b>Password</b></label>
                    <input type="password" name="password" required>

                    <input type="submit" name="create" value="Sign Up" >
                    </div>
        </form>
        <div class="para">
                <p>Clicking the sign up button, you are agree to our <br>
                <a href="#">Terms and Conditions</a>and <a href="#">Policy Privacy</a></p><br>
                <p>Alrady have an account? <a href="login.php">Login Here</a></p>
                </div>
</div>


    
</body>
</html>









</section>
<?php
include("footer.php");
?>     
 