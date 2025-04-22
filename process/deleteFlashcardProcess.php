<?php

    include "./connection.php";

    if(isset ($_GET['id'])){
        $flashcardID = $_GET['id'];
        $query = "DELETE FROM FLASHCARD WHERE FLASHCARD_ID='$flashcardID'";
        if($results = mysqli_query($connection, $query)){
            echo "Removed!";
            echo "This page will refresh in 3 seconds.";
            header("Refresh: 3; url=../deleteFlashcard.php");
        }
        
    }
?>