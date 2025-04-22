<?php 

session_start();

include "./connection.php";

if(isset($_POST['btnLogin'])){
    $username = $_POST['txtID'];
    $password = $_POST['txtPassword'];

    $query = "SELECT * from ADMIN WHERE USERNAME ='$username' AND PASSWORD='$password'";

    $results = mysqli_query($connection, $query);

    if($row = mysqli_fetch_assoc($results)){
        echo 'record found!';
        header("Location: ../adminMain.php");
        $_SESSION['adminID'] = $row['ADMIN_ID'];
        $_SESSION['username'] = $row['USERNAME'];
    } else{
        echo "<script>alert('You have entered invalid login credentials! Please try again.');</script>";
        header("Refresh: 5; url=../adminLogin.php");
    } 
}


?>