<?php 
    require_once "includes/session.php"; 
?>
<?php 
    // session_destroy eliminates the session. header redirects to home page 
    session_destroy(); 
    header("Location: index.php"); 
?>