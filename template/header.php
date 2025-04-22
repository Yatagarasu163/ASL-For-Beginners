<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASL For Beginners</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>American Sign Language For Beginners</h2>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="flashcardSelection.php">Flashcards</a>
            <a href="quizSelection.php">Quizzes</a>
            <a href="customFlashcardSelection.php">Custom Flashcards</a>
            <a href="customQuizSelection.php">Custom Quizzes</a>
            <a href="history.php">History</a>
            <a class="backButton">Back</a>
        </div>

        <div class="mainSection active">
            <div class="header">
                <div class="navbar">
                    <div class="hamburgerMenu">
                        <img src="images/hamburger-menu.png" alt="hamburger menu" class="hamburgerButton">
                    </div>

                    

                    <div class="profile">
                        <?php
                            if(count($_SESSION) === 0){
                                echo "Guest Account";
                            } else{
                                echo $_SESSION['username'];
                            }
                        ?>
                        <img src="images/profile.png" alt="profile">
                    </div>

                    
                    
                    <div class="logout-box" id="logoutBox">
                        <?php 
                            if(count($_SESSION) === 0){
                                echo '<a href="signup.php"><div class="logout-item">Sign Up</div></a>';
                                echo '<hr>';
                                echo '<a href="login.php"><div class="logout-item">Log In</div></a>';
                            }
                            else{
                                echo '<a href="process/logoutProcess.php"><div class="logout-item">Log out</div></a>';
                            }
                        ?>
                        <hr>
                        <a href="about.php"><div class="logout-item">About</div></a>
                        <hr>
                        <a href="history.php"><div class="logout-item">Results</div></a>
                    </div>

                </div>
                
            </div>