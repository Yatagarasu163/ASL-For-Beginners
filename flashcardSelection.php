<?php include("template/header.php");?>
<?php 
include "template/checkUser.php";

?>
            
            <title>Flashcard Selection Page</title>
            
            <div class="content">
                <div class="titleBar">
                    <div class="title">
                        Flashcards Selection
                    </div>
                </div>
                
                <div class="grid">
                    <a href="flashcard.php?id=1 ;"class="flashcard">A to D</a>
                    <a href="flashcard.php?id=2 ;"class="flashcard">E to H</a>
                    <a href="flashcard.php?id=3 ;"class="flashcard">I to L</a>
                    <a href="flashcard.php?id=4 ;"class="flashcard">M to P</a>
                    <a href="flashcard.php?id=5 ;"class="flashcard">Q to T</a>
                    <a href="flashcard.php?id=6 ;"class="flashcard">U to Z</a>
                </div>

            </div>
        </div>
        
<?php include("template/footer.php");?>
