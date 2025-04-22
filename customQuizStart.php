<?php 

include ("process/connection.php");
include "template/header.php" 
?>
            
            
<div class="content">
                <div class="titleBar">
                    <a href="customQuizSelection.php" class="backbtn">&larr;</a>
                    <div class="title">
                        Quizzes Selection
                    </div>
                </div>
                
                <?php

                $user_id = $_SESSION['user_id'];
                $id = $_GET['id'];
                $query = "SELECT QUIZ_NAME, QUIZ_DESCRIPTION FROM quiz WHERE QUIZ_ID = $id";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                ?>

                <div class="cusFlashcardContainer">
                    <div class="cardTitle">
                        <?php
                        echo $row['QUIZ_NAME'];
                        ?>
                    </div>
                    <div class="cardDesc">
                        <?php
                        echo $row['QUIZ_DESCRIPTION'];
                        ?>
                    </div>
                    <a href="quiz.php?id=<?php echo $id ?>" class="startBtn">
                        Start!
                    </a>
                </div>
            </div>
        </div>
        
        
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
