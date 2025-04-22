<?php 
include ("process/connection.php");
include("template/header.php");
include("template/checkUser.php");
?>
            
            
<div class="content">
                <div class="titleBar">
                    <div class="title">
                        Flashcards Selection
                    </div>
                </div>
                
                <div class="cusFlashcardContainer">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT FLASHCARD_ID, FLASHCARD_NAME FROM flashcard WHERE FLASHCARD_ID > 6";
                    $result = mysqli_query($connection,$query);

                    $testFlashcards = [];

                    while($row=mysqli_fetch_assoc($result)){

                        $testFlashcards[] = $row
                        ?>
                        <a href="customFlashcardStart.php?id=<?php echo $row['FLASHCARD_ID'] ?>">
                            <div class="cusFlashcard">
                                <?php 
                                echo $row['FLASHCARD_NAME'];
                                ?>
                            </div>
                        </a>

                        <?php
                    }

                    if($testFlashcards == []){
                        echo "There are no flashcards added yet! Please come back another time!";
                    }
    

                    ?>
                </div>
            </div>
        </div>
        
        
<?php include("template/footer.php");?>
