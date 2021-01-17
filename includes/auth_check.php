<?php 
    if(!isset($_SESSION['userid'])) {
        // not logged in 
        header("Location: login.php"); 
    }
?>