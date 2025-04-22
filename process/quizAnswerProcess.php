<?php 
session_start();

if(count($_GET) > 0){
    $answer = $_GET['ans'];
}

if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($answer == $_SESSION['cAns']){
    $_SESSION['score'] += 1;
}

if($_SESSION['questionIndex'] < ($_SESSION['quizLength'] - 1)){
    $_SESSION['questionIndex'] += 1;
    header("Location: ../quiz.php?id=" . $_SESSION['quizID']);
} else{
    include("./connection.php");

    $today = date("d/m/Y", time());

    $score = $_SESSION['score'];
    $userID = $_SESSION['user_id'];
    $quizID = $_SESSION['quizID'];

    $query = "INSERT INTO QUIZ_HISTORY (COMPLETION_DATE, SCORE, USER_ID, QUIZ_ID) VALUES (CURDATE(), '$score', '$userID', '$quizID');";

    mysqli_query($connection, $query);

    $_SESSION['quizHistoryID'] = mysqli_insert_id($connection);

    mysqli_close($connection);

    unset($_SESSION['questionIndex']);
    unset($_SESSION['quizID']);
    unset($_SESSION['score']);

    header("Location: ../result.php");
}

?>