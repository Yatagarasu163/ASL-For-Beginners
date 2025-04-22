<?php include "template/adminHeader.php" ?>
<?php 
include "template/adminCheckUser.php";
?>
            
            <title>Delete Quiz</title>

            <style>
                div#noQuiz{
                    display: flex;
                    justify-content: center;
                }
            </style>
            
            <div class="content">
                <div class="titleBar">
                    
                    <div class="title">
                        Delete Quiz
                    </div>
                </div>
                
                <div class="cusFlashcardContainer">

                    <div class="delContainer">


                        <?php 
                            include "./process/connection.php";

                            $query = "SELECT * FROM quiz WHERE QUIZ_ID > 6";

                            $results = mysqli_query($connection, $query);
                            if(mysqli_num_rows($results) > 0){
                                while($row = mysqli_fetch_assoc($results)){
                                    ?>
                                        <div class="cardRow">
                                            <div class="flashcardName">
                                                <?php echo $row['QUIZ_NAME']?>
                                            </div>
                                            <a href="./process/deleteQuizProcess.php?id=<?php echo $row['QUIZ_ID']?>"><img src="images/trash.png" alt=""></a>
                                        </div>
                                    <?php
    
                                }
                            }
                            else{
                                ?>
                                    <div class="cardRow">
                                        <div class="flashcardName" id="noQuiz">
                                            There are no quizzes to delete!
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
