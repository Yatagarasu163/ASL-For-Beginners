<?php include("template/header.php");?>
<?php 
include "template/checkUser.php";
?>

<?php 
    include "./process/connection.php";
    $quizHistoryID = $_SESSION['quizHistoryID'];
    $query = "SELECT * FROM QUIZ_HISTORY WHERE QUIZ_HISTORY_ID = '$quizHistoryID'";
    $result = mysqli_query($connection, $query);
    $quizHistory = [];
    while($row = mysqli_fetch_assoc($result)){
        $quizHistory = $row;
    }

    $score = $quizHistory['SCORE'];
    $userID = $quizHistory['USER_ID'];
    $quizID = $quizHistory['QUIZ_ID'];
    $completionDate = $quizHistory['COMPLETION_DATE'];

    $query = "SELECT * FROM QUIZ WHERE QUIZ_ID = '$quizID'";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $quizName = $row['QUIZ_NAME'];
    }

    $query = "SELECT * FROM USERS WHERE USER_ID = '$userID'";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $userName = $row['USERNAME'];
    }
?>
            
            <title>Results</title>

            <style>
                h1{
                    margin: 20px;
                }
            </style>
            
            <div class="content">
                <div class="titleBar">
                    
                    <div class="title">
                        Quiz Result
                    </div>
                </div>
                <div class="resultContainer">
                    <div class="textField">
                        <h1>Quiz: <?php echo $quizName; ?></h1>
                        <h2>You got <?php echo $score; ?>!</h2>
                        <h3>Congratulations, <?php echo $userName; ?>!</h3>
                    </div>
                    <div class="btnField">
                        <div class="btnRow">
                            <a href="quiz.php?id=<?php echo $quizID; ?>" class="retake">
                                Retake Quiz
                            </a>
                        </div>
                        <div class="btnRow">
                            <a href="flashcardMain.php" class="flashcardsBtn">
                                Flashcards
                            </a>
                            <a href="history.php" class="historyBtn">
                                History
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php include("template/footer.php");?>
