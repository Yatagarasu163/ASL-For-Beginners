<?php include("template/header.php");?>
<?php 
include "template/checkUser.php";
?>
            
            <title>Main Quiz Page</title>

            <div class="content">
                <div class="topBanner">
                    ASL For Beginners
                </div>
                <div class="mainBox">
                    <div class="quizRow">
                        <a href="quizSelection.php" class="mainQuizBox">
                            Quiz
                        </a>
                        <a href="customQuizSelection.php" class="cusQuizBox">
                            Custom Quizzes
                        </a>
                    </div>
                    <div class="quizRow">
                        <a href="history.php" class="historyBox">
                            History
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php include("template/footer.php");?>
