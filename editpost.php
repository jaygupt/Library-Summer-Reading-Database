<?php 
    require_once 'db/conn.php'; 
    // Get values from post operation
    if (isset($_POST['submit'])) {
        $id = $_POST['id']; 
        $fname = $_POST["firstname"]; 
        $lname = $_POST["lastname"]; 
        $age = $_POST["age"]; 
        $gradeInFall = $_POST["gradeInFall"]; 
        if (isset($_POST["rfsb"])) {
            $rfsb = "Yes"; 
        } else {
            $rfsb = "No"; 
        }
        if (isset($_POST["rfp"])) {
            $rfp = "Yes"; 
        } else {
            $rfp = "No"; 
        }
        if (isset($_POST['rsrt'])) {
            $rsrt = "Yes";
        } else {
            $rsrt = "No"; 
        }
        $outreachCode = $_POST["outreachCode"]; 

        $result = $crud->editAttendee($id, $fname, $lname, $age, $gradeInFall, $rfsb, $rfp, $rsrt, $outreachCode); 

        if ($result) {
            header("Location: viewstudents.php"); 
        } else {
            include "includes/errorMessage.php"; 
        }
        
    } else {
        include "includes/errorMessage.php"; 
    }
?>