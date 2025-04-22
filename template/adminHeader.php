<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Admin Page</title> -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>American Sign Language For Beginners</h2>
            <a href="adminMain.php">Home</a>
            <a href="adminFlashcard.php">Flashcards</a>
            <a href="adminQuiz.php">Quizzes</a>
            <a class="backButton">Back</a>
        </div>

        <div class="mainSection active">
            <div class="header">
                <div class="navbar">
                    <div class="hamburgerMenu">
                        <img src="images/hamburger-menu.png" alt="hamburger menu" class="hamburgerButton">
                    </div>

                    <div class="profile">
                        <img src="images/profile.png" alt="profile">
                    </div>

                    <div class="logout-box" id="logoutBox">
                        <?php 
                            if(count($_SESSION) === 0){
                                echo '<a href="adminLogin.php"><div class="logout-item">Log in</div></a>';
                            }
                            else{
                                echo '<a href="process/adminLogoutProcess.php"><div class="logout-item">Log out</div></a>';
                            }
                        ?>
                    </div>
                </div>
                
            </div>