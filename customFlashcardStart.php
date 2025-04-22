<?php 

include "process/connection.php";
include "template/header.php";
?>           
            
            <div class="content">
                <div class="titleBar">
                    <a href="customFlashcardSelection.php" class="backbtn">&larr;</a>
                    <div class="title">
                        Flashcards Selection
                    </div>
                </div>
                
                <?php

                $user_id = $_SESSION['user_id'];
                $id = $_GET['id'];
                $query = "SELECT FLASHCARD_NAME, FLASHCARD_DESCRIPTION FROM flashcard WHERE FLASHCARD_ID = $id";
                $result = mysqli_query($connection, $query);
                $row=mysqli_fetch_assoc($result);
                ?>

                <div class="cusFlashcardContainer">
                    <div class="cardTitle">
                        <?php
                        echo $row['FLASHCARD_NAME'];
                        ?>
                    </div>
                    <div class="cardDesc">
                        <?php
                        echo $row['FLASHCARD_DESCRIPTION'];
                        ?>
                    </div>
                    <a href="flashcard.php?id=<?php echo $id ?>" class="startBtn">
                        Start!
                    </a>
                </div>
            </div>
        </div>
        
<?php include "template/footer.php" ?>
