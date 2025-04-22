<?php 
if(count($_SESSION) === 0){
    ?>
    <script>
        alert("You must log in first before accessing these features!");
        window.location.href="login.php";
    </script>
<?php
}
?>