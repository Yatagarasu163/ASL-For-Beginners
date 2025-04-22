<?php include "template/adminHeader.php" ?>
<?php 
include "template/adminCheckUser.php";
?>

<title>Create Quiz Page</title>

<?php
    if(!isset($_GET['count']) || $_GET['count'] == ""){
        ?>
        <script>
            let count = "";
            let success = false;
            while(success == false){
               try{
                    count = prompt("Please enter how many questions you want to make: ", "1");
                    while(parseInt(count) < 0){
                        count = prompt("Please enter how many questions you want to make: ", "1");
                    }
                } catch (err){
                    success = false;
                } 
                if(parseInt(count) > 0){
                    success = true;
                }
            }
            
            window.location.href = "./createQuiz.php?count=" + count;  
        </script>
        <?php
    } else{
        $count = $_GET['count'];
    }
?>
            
            
            <div class="content">
                <div class="titleBar">
                    <div class="title">
                        Create Quizzes
                    </div>
                </div>
                <form action="./process/createQuizProcess.php?count=<?php echo $count?>" method="post" enctype="multipart/form-data">
                    <div class="cusFlashcardContainer">
                        <div class="cardTitle">
                            <input type="text" name="quizName" id="quizName" placeholder="Enter your quiz name here."  required>
                        </div>
                        <div class="quizDesc">
                            <input type="text" name="quizDesc" id="quizDesc" placeholder="Enter your quiz description here." required>
                            <a href=""><img src="images/trash.png" alt=""></a>
                        </div>

                        <?php

                        for ($i = 0; $i < $count; $i++){
                        ?>
                            <div class="createContainer">
                                
                                <div class="quizAns">
                                    <input type="text" name="txtQuestion<?php echo $i + 1 ?>" class="txtQuestion" placeholder="Enter your question here." required>
                                </div>
    
                                <div class="quizAns">
                                    <input type="file" name="fileImg<?php echo $i + 1 ?>" class="imgInput" accept="image/*" required>
                                </div>


                                <?php 
                                for ($x = 0; $x < 4; $x++){
                                ?>
                                <div class="quizAns">
                                    <input type="text" name="question<?php echo $i + 1?>ans<?php echo $x + 1?>" placeholder="Possible answer." required>
                                    <input type="radio" name="rdoCorrectAns<?php echo $i + 1?>" value=<?php echo $x?> id="" required>
                                </div>

                                <?php
                                }
                                ?>
    
    
                            </div>
                        <?php
                        }

                        ?>

                        <a href="./createQuiz.php?count=<?php echo $count + 1?>" class="addBtn">Add a New Question</a>

                        <button type="submit" value="submit" class="addBtn" name="btnSubmit">Submit</button>

                    </div>
                </form>
            </div>
        </div>

        
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
