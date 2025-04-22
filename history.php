<?php 
include ("process/connection.php");
include("template/header.php");
include("template/checkUser.php");
?>          
            
            <div class="content">
                <div class="titleBar">
                    <div class="title">
                        Quiz History
                    </div>
                </div>
                
                <div class="tableContainer">
                    <table class="historyTable">
                        <thead>
                            <tr>
                                <th>Quiz</th>
                                <th>Score</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT quiz.QUIZ_NAME, qh.SCORE, qh.COMPLETION_DATE FROM quiz_history qh INNER JOIN quiz ON qh.QUIZ_ID = quiz.QUIZ_ID WHERE qh.USER_ID = $user_id";
                            $result = mysqli_query($connection, $query);
                            
                            while($row = mysqli_fetch_assoc($result)){
                                echo"<tr>";

                                echo"<td>" . $row['QUIZ_NAME'] . "</td>";
                                echo"<td>" . $row['SCORE'] . "</td>";
                                echo "<td>" . date("d/m/Y", strtotime($row['COMPLETION_DATE'])) . "</td>";

                                echo"</tr>";
                            
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        
        
<?php include("template/footer.php");?>