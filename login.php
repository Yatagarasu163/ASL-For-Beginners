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

<title>Login</title>

            <div class="loginContent">
                
                <div class="loginBox">
                    <form action="" method="post">
                        <h1>Log In</h1>
                        <label for="email">Email:<span style="color: red;">*</span></label>
                        <input type="email" name="email" id="email" required>
    
                        <label for="password">Password:<span style="color: red;">*</span></label>
                        <input type="password" name="password" id="password" required>

                        <h3>* required</h3>
    
                        <button type="submit" class="btn" name="loginBtn">Log In</button>
                    </form>
                    <div class="link">
                        <p>Sign Up an account <a href="signup.php">here</a> !</p>
                        <p>Are you an Admin? <a href ="adminLogin.php">here</a> !</p>
                    </div>

                    <?php
                    if (isset($_POST['loginBtn'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $error = null;
                        if (empty($email)|| empty($password)) {
                            $error = "All fields must be filled up.";
                        }

                        if ($error != null) {
                            echo "<script>alert('$error')</script>"; 
                        }else{

                            $query1 = "SELECT * FROM users WHERE EMAIL='$email' AND password='$password'";
                            $result1 = mysqli_query($connection, $query1);


                            if (mysqli_num_rows($result1) > 0) {
                                while ($row = mysqli_fetch_assoc($result1)) {
                                    $_SESSION['user_id'] = $row['USER_ID'];
                                    $_SESSION['username'] = $row['USERNAME'];
                                    $_SESSION['email'] = $row['EMAIL'];
                                }
                                session_write_close();
                                header("Location: index.php");
                                exit;
                            } else{
                                echo 'Incorrect email or password.';
                            }
                        }

                        
                    }
                    ?>
                </div>
                
            </div>

            

        </div>


<?php include "./template/footer.php" ?>
