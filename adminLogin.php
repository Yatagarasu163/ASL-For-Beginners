<?php 
include("./template/adminHeader.php");
?>

    <title>Admin Login Page</title>

            <div class="loginContent">
                
                <div class="loginBox">
                    <form action="./process/adminLoginProcess.php" method="post">
                        <h1>Log In</h1>
                        <label for="txtID">Admin Username:<span style="color: red;">*</span></label>
                        <input type="text" name="txtID" id="" required>
    
                        <label for="txtPassword">Password:<span style="color: red;">*</span></label>
                        <input type="password" name="txtPassword" id="" required>

                        <h3>* required</h3>
    
                        <button type="submit" name='btnLogin' class="btn">Log In</button>
                        <div class="link">
                        <p>Are you an User? <a href ="login.php">here</a> !</p>
                    </div>
                    </form>
                </div>
                
            </div>

            

        </div>


    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
