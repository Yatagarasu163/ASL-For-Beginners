<?php include("template/header.php");?>
<?php 
include "template/checkUser.php";
include "process/connection.php"
?>

    <?php 
    if(isset($_GET['id'])){
        $quiz_id = ($_GET['id']);
        $query = "SELECT * FROM QUIZ WHERE QUIZ_ID = '$quiz_id'";
        $_SESSION['quizID'] = $quiz_id;
    } else if(isset($_GET['name'])){
        $quizName = $_GET['name'];
        $query = "SELECT * FROM QUIZ WHERE QUIZ_NAME = '$quizName'";
    }
    $result = mysqli_query($connection,$query);

    $checkquiz = [];

    while($row = mysqli_fetch_assoc($result)){
        
        $checkquiz[] = $row;
    }    
    if($checkquiz == []) {  
            if(isset($_GET['name'])){
                $quizName = $_GET['name'];
                echo "<script>
                alert('This quiz does not exist!');
                window.location.href = './quizSelection.php';
                </script>"; 
            }elseif(isset($_GET['id'])){
                $quiz_id = $_GET['id'];
                echo "<script>
                alert('This quiz does not exist!');
                window.location.href = './customQuizSelection.php';
                </script>";
            } else{
                echo "<script>
                alert('This quiz does not exist!');
                window.location.href = './quizSelection.php';
                </script>";  
            }
        }


    

    if(!isset($_GET['q']) && !isset($_SESSION['questionIndex'])){
        $_SESSION['questionIndex'] = 0;
    }

    $questionIndex = $_SESSION['questionIndex'];

    $results = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($results)){
        $_SESSION['quizID'] = $row['QUIZ_ID'];
        $questionid = $row['QUESTION_ID_CSV'];
    }

    $questionidArr = explode("&nbsp", $questionid);
    $currentQuestionID = $questionidArr[$questionIndex];
    $_SESSION['quizLength'] = count($questionidArr);
    $query = "SELECT * FROM QUESTION WHERE QUESTION_ID = '$currentQuestionID'";
    $results = mysqli_query($connection, $query);
    $currentQuestionArr = [];
    while($row = mysqli_fetch_assoc($results)){
        $currentQuestionArr = $row;
    }

    $questionName = $currentQuestionArr['QUESTION_NAME'];
    $options = explode("&nbsp", $currentQuestionArr['OPTIONS_CSV']);
    $correctAnsIndex = $currentQuestionArr['CORRECT_ANSWER'];
    $_SESSION['cAns'] = $correctAnsIndex;
    $imgID = $currentQuestionArr['IMAGE_ID'];
    
    $query = "SELECT IMAGE_BLOB FROM image WHERE IMAGE_ID ='$imgID'";
    $results = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($results)){
        $img = $row['IMAGE_BLOB'];
    }

    mysqli_close($connection);
    ?>
            
            <title>Quiz</title>
            
            <div class="content">
                <div class="titleBar">
                    
                    <div class="title">
                        Quiz
                    </div>
                </div>
                <div class="quizContainer">
                    <div class="quizImgContainer">
                        <?php echo '<img src="data:image/*;base64,'.base64_encode($img).'"/>'; ?>
                        <h2><?php echo $questionName; ?></h2>
                    </div>
                    <div class="choicesGrid">
                        <?php 
                            for($i = 0; $i < count($options); $i++){
                                ?>
                                <a href="./process/quizAnswerProcess.php?ans=<?php echo $i; ?>">
                                    <div class="choice"> <?php echo $options[$i]; ?></div>
                                </a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
<?php include("template/footer.php");?>
