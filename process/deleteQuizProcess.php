<?php

    include "./connection.php";

    if(isset ($_GET['id'])){
        $quizID = $_GET['id'];
        $query = "DELETE FROM QUIZ WHERE QUIZ_ID='$quizID'";
        if($results = mysqli_query($connection, $query)){
            echo "Removed!";
            echo "This page will refresh in 3 seconds.";
            header("Refresh: 3; url=../deleteQuiz.php");
        }
        
    }
?>