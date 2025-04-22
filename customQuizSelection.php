<?php 

include ("process/connection.php");
include("template/header.php");
include("template/checkUser.php");
?>
            
            
            <div class="content">
                <div class="titleBar">
                    <div class="title">
                        Quizzes Selection
                    </div>
                </div>
                
                <div class="cusFlashcardContainer">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT QUIZ_ID, QUIZ_NAME FROM quiz WHERE QUIZ_ID > 6";
                    $result = mysqli_query($connection,$query);

                    $testquizes = [];

                    while($row=mysqli_fetch_assoc($result)){

                        $testquizes[] = $row

                        ?>
                        <a href="customQuizStart.php?id=<?php echo $row['QUIZ_ID'] ?>">
                            <div class="cusFlashcard">
                                <?php 
                                echo $row['QUIZ_NAME'];
                                ?>
                            </div>
                        </a>

                        <?php
                    }
                    if($testquizes == []){
                        echo "There are no quiz added yet! Please come back another time!";
                    }

                    ?>
                </div>
            </div>
        </div>
        
        
<?php include("template/footer.php");?>
