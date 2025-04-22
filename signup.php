<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'asldb';

$connection =  mysqli_connect($server, $user, $password, $database);
if ($connection == false) {
    die('Connection failed!' . mysqli_connect_error());
}
?>

<?php include("./template/header.php") ?>

<title>Sign Up</title>

            <div class="loginContent content">
                
                <div class="loginBox">
                    <form action="" method="post">
                        <h1>Sign Up</h1>
                        <label for="email">Email<span style="color: red;">*</span></label>
                        <input type="text" name="email" id="email" required>
    
                        <label for="username">Username:<span style="color: red;">*</span></label>
                        <input type="text" name="username" id="username" required>

                        <label for="password">Password:<span style="color: red;">*</span></label>
                        <input type="password" name="password" id="password" required>
    
                        <label for="conPassword">Confirm Password:<span style="color: red;">*</span></label>
                        <input type="password" name="conPassword" id="conPassword" required>

                        <h3>* required</h3>
    
                        <button type="submit" class="btn">Sign Up</button>
                        <br>

                    </form>

                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $conPassword = $_POST['conPassword'];

                        $error = null;
                        $userExists = "SELECT * FROM users WHERE USERNAME = '$username'" ;
                        $emailExists = "SELECT * FROM users WHERE EMAIL = '$email'" ;
                        

                        if (empty($email) || empty($username) || empty($password) || empty($conPassword)){
                            $error = "All fields are required to be filled in.";
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $error = "Invalid email format.";
                        } elseif ($emailError = mysqli_query($connection,$emailExists)){
                            if(mysqli_num_rows($emailError) > 0){
                                $error = "Email already exists";
                            } 
                        } elseif ($userError = mysqli_query($connection,$userExists)){
                            if(mysqli_num_rows($userError) > 0){
                                $error = "Username already exists";
                            }
                        } elseif (!preg_match("/^[a-zA-Z ]*$/", $username)){
                            $error = "Your username should only contains letters and whitespaces.";
                        } elseif ($password != $conPassword){
                            $error = "The passwords does not match each other.";
                        }

                        if($error != null){
                           echo "<script>alert('$error')</script>"; 
                        }else {
                            $query = "INSERT INTO users(USERNAME,EMAIL,PASSWORD) VALUES ('$username','$email','$password')";
                            if (mysqli_query($connection, $query)) {
                                header("Location: login.php"); 
                            } else {
                                echo 'Error, please try again!';
                            }
                            mysqli_close($connection); 
                        }

                        
                    }

                    ?>
                
                    <div class="loginAnchor">
                        <a href="./login.php">Log In</a>
                    </div>
                </div>
                
            </div>

            

        </div>


<?php include("./template/footer.php"); ?>