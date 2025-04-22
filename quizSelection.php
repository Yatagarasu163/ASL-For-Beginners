<?php include("template/header.php");?>
<?php 
include "template/checkUser.php";
?>
            
            <title>Quiz Selection</title>
            
            <div class="content">
                <div class="titleBar">
                    
                    <div class="title">
                        Quizzes Selection
                    </div>
                </div>
                
                <div class="grid">
                    <a href="quiz.php?name=A%20to%20D" class="flashcard">A to D</a>
                    <a href="quiz.php?name=E%20to%20H" class="flashcard">E to H</a>
                    <a href="quiz.php?name=I%20to%20L" class="flashcard">I to L</a>
                    <a href="quiz.php?name=M%20to%20P" class="flashcard">M to P</a>
                    <a href="quiz.php?name=Q%20to%20T" class="flashcard">Q to T</a>
                    <a href="quiz.php?name=U%20to%20Z" class="flashcard">U to Z</a>
                </div>

            </div>
        </div>
        
        
<?php include("template/footer.php");?>