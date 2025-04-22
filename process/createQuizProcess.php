


<?php 

include "connection.php";

if(isset($_GET['count'])){
    $count = $_GET['count'];
}
else{
    $count = 1;
}

if(!empty($_POST)){

    echo "POST request contains data";

    $questionID = [];

    $quizName = $_POST['quizName'];
    $quizDesc = $_POST['quizDesc'];

    include "saveImage.php";
    
    
    for($i = 0; $i < $count; $i++){
        $questionName = $_POST['txtQuestion' . $i + 1];
        
        $optionsArr = [];
        
        for($x = 0; $x < 4; $x++){
            $optionsArr[] = $_POST['question' . $i + 1 . 'ans' . $x + 1];
        }
        
        $optionsCSV = implode("&nbsp", $optionsArr);

        $correctAns = $_POST['rdoCorrectAns' . $i + 1];

        $query = "INSERT INTO QUESTION(QUESTION_NAME, OPTIONS_CSV, CORRECT_ANSWER, IMAGE_ID) VALUES('$questionName', '$optionsCSV', '$correctAns', '$imgIDs[$i]')";

        mysqli_query($connection, $query);

        $questionID[] = mysqli_insert_id($connection);

    }

    $questionIDCSV = implode("&nbsp", $questionID);

    ?>

    <br>
    <br>
    <br>

    <?php

    $query = "INSERT INTO QUIZ(QUIZ_NAME, QUIZ_DESCRIPTION, QUESTION_ID_CSV) VALUES('$quizName', '$quizDesc', '$questionIDCSV')";

    mysqli_query($connection, $query);

    mysqli_close($connection);

} else{
    echo "POST request is empty";
}

?>

<script>
    alert("Saved the quiz successfully!");
    window.location.href = '../adminQuiz.php';
</script>