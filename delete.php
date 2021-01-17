<?php 
    include_once "includes/session.php";
    require_once "includes/auth_check.php";
    require_once "db/conn.php"; 

    if (!$_GET['id']) {
        header("Location: viewstudents.php"); 
    } else {
        // get id
        $id = $_GET['id'];
        
        // delete the record
        $result = $crud->deleteStudent($id); 
        // 

        if ($result) {
            header("Location: viewstudents.php"); 
        } else {
            include "includes/errorMessage.php";  
        }
    }
?>