<?php

include "connection.php";

if(isset($_GET['count'])){
    $count = $_GET['count'];
} else{
    $count = 1;
}

if(!empty($_POST)){
    echo "POST request contains data";

    $flashcardID = [];

    $flashcardName = $_POST['txtFlashcardName'];
    $flashcardDesc = $_POST['txtFlashcardDesc'];

    include "saveImage.php";

    $itemDescArr = [];
    $imgID = [];

    for($i = 0; $i < $count; $i++){
        $flashcardAns = $_POST['txtAns' . $i + 1];
        $itemDescArr[] = $flashcardAns;

    }

    $itemDescCSV = implode("&nbsp", $itemDescArr);
    $imgIDCSV = implode("&nbsp", $imgIDs);

    $query = "INSERT INTO FLASHCARD(FLASHCARD_NAME, FLASHCARD_DESCRIPTION, ITEM_DESCRIPTOR_CSV, IMAGE_ID_CSV) VALUES ('$flashcardName', '$flashcardDesc', '$itemDescCSV', '$imgIDCSV')";

    if(mysqli_query($connection, $query)){
        echo "Saved the flashcard onto the database!";
    } else{
        echo "Failed to save the flashcard onto the database!";
    }
}


mysqli_close($connection);
?>

<script>
    alert("Saved the flashcard successfully!");
    window.location.href = '../adminFlashcard.php';
</script>