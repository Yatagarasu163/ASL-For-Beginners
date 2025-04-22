<?php include "template/adminHeader.php"; ?>
<?php 
include "template/adminCheckUser.php";
include "process/connection.php";
?>

<title>Create Flashcards</title>

<?php
    if(!isset($_GET['count']) || $_GET['count'] == ""){
        ?>
        <script>
            let count = "";
            let success = false;
            while(success == false){
               try{
                    count = prompt("Please enter how many flashcards you want to make: ", "1");
                    while(parseInt(count) < 0){
                        count = prompt("Please enter how many flaschards you want to make: ", "1");
                    }
                } catch (err){
                    success = false;
                } 
                if(parseInt(count) > 0){
                    success = true;
                }
            }
            
            window.location.href = "./createFlashcard.php?count=" + count;  
        </script>
        <?php
    } else{
        $count = $_GET['count'];
    }
?>

            <form action="./process/createFlashcardProcess.php?count=<?php echo $count?>" method="post" enctype="multipart/form-data">
                <div class="content">
                    <div class="titleBar">
                        <div class="title">
                            Create Flashcards
                        </div>
                    </div>
                    
                    <div class="cusFlashcardContainer">
                        <div class="cardTitle">
                            <input type="text" name="txtFlashcardName" id="cardName" placeholder="Enter your flashcard title here." required>
                        </div>

                        <div class="cardDesc">
                            <input type="text" name="txtFlashcardDesc" id="cardDesc" placeholder="Enter your flashcard title " required>
                        </div>
                        
                        <?php
                            for($i = 0; $i < $count; $i++){
                        ?>

                        <div class="createContainer">
                            <div class="cardWord">
                                <input type="file" name="fileImg<?php echo $i + 1?>" id="" required>
                            </div>

                            <div class="cardWord">
                                <input type="text" name="txtAns<?php echo $i + 1?>" id="txtAns" placeholder="Enter your answer here." required>
                            </div>
                        </div>
                        
                        <?php
                            }
                        ?>

                        <a href="./createFlashcard.php?count=<?php echo $count + 1?>" class="addBtn">Add a new Item</a>

                        <button class="addBtn">Submit</button>

                        
                        </div>
                    </div>
                </div>
            </form>
        
        
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
