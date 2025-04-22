<?php
session_start();
session_destroy();
?>

<script>
    alert("You have been logged out!");
    window.location.href = "../adminLogin.php";
</script>
<?php exit; ?>