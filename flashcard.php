<?php include("template/header.php");?>
<?php 
include "template/checkUser.php";
include "process/connection.php";
?>
            <title>Flashcards</title>
            
            <div class="content">
                <div class="titleBar">
                    <div class="title">
                        Flashcards
                    </div>
                </div>
                <div class="flashcardContainer">
                    <button class="arrowBox" id="left">
                        &lt;
                    </button>
                    <?php 
                        if (isset($_GET['id'])) {
                            $currentID = $_GET['id'];
                        }
                        

                        $query = "SELECT ITEM_DESCRIPTOR_CSV, IMAGE_ID_CSV FROM flashcard WHERE FLASHCARD_ID = $currentID";

                        $results = mysqli_query($connection, $query);
                        $itemdescriptor = [];
                        while ($row = mysqli_fetch_assoc($results)) {
                            $itemdescriptor = explode('&nbsp', $row['ITEM_DESCRIPTOR_CSV']);
                            $imageid = explode('&nbsp', $row['IMAGE_ID_CSV']);
                           
                        }



                        $imageidString = implode(',', array_map('intval', $imageid)); 


                

                        $query = "SELECT * FROM image WHERE IMAGE_ID IN ($imageidString)";
                        $results = mysqli_query($connection, $query);
                        $testRetrieve = [];

                        while ($row = mysqli_fetch_assoc($results)) {
                            $testRetrieve[] = $row['IMAGE_BLOB'];
                        }


                        echo '<div class="card" id="card">';
                        for ($i = 0; $i < count($itemdescriptor); $i++) {
                            echo '<div class="item">';
                            echo '  <div class="flipCard" id="' . $i . '" onclick="flip(' . $i . ')">';
                            echo '    <div class="cardFront">';
                            echo '      <img src="data:image/*;base64,' . base64_encode($testRetrieve[$i]) . '" class="flashcard-img"/>';
                            echo '    </div>';
                            echo '    <div class="cardBack">';
                            echo '      <p>' . htmlspecialchars($itemdescriptor[$i]) . '</p>';
                            echo '    </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                        echo '</div>';
                    ?>
                    <button class="arrowBox" id="right">
                        &gt;
                    </button>
                </div>
            </div>
        </div>

<script>
    const prev = document.getElementById('left')
    const next = document.getElementById('right')
    const list = document.getElementById('card')
    const itemWidth = 450
    const padding = 5

    prev.addEventListener('click',()=>{
    list.scrollLeft -= (itemWidth + padding)
    })
    next.addEventListener('click',()=>{
    list.scrollLeft += (itemWidth + padding)
    })
</script>
        
        
<?php include("template/footer.php");?>

