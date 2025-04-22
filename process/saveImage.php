<?php 

include "./connection.php";


$allowedTypes = ['image/png', 'image/jpeg', 'image/gif'];
if(isset($_GET['count'])){
    $count = $_GET['count'];
} else{
    $count = 1;
}
for($i = 0; $i < $count; $i++){
    $files[] = $_FILES['fileImg' . $i + 1];

    if(!in_array($files[$i]['type'], $allowedTypes)){
        die("Only JPG, PNG and GIF types are allowed.");
    }

    
    $imageBLOB = file_get_contents($files[$i]['tmp_name']);
    
    try{
        $query = "INSERT INTO image (IMAGE_BLOB) VALUES (?)";
    
        $stmt = mysqli_prepare($connection, $query);
    
        mysqli_stmt_bind_param($stmt, "b", $imageBLOB);
        mysqli_stmt_send_long_data($stmt, 0, $imageBLOB);
        
        if(mysqli_stmt_execute($stmt)){
            echo "Saved the image!";
        } else{
            echo "Did not save the image!";  
        }

        $imgIDs[] = mysqli_insert_id($connection);
    
    } catch (Exception $ex){
        echo "Something wrong happened!";
        echo $ex;
    }
}



?>
