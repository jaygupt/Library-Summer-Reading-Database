    <?php
        $title = "Success"; 
        require_once "includes/header.php"; 
        require_once "db/conn.php"; 

        if (isset($_POST['submit'])) {
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
            $isSuccess = $crud->insertStudent($fname, $lname, $age, $gradeInFall, $rfsb, 
            $rfp, $rsrt, $outreachCode); 

            if ($isSuccess) {
                include "includes/successMessage.php";  
            } else {
                include "includes/errorMessage.php";  
            }
        }
    ?>

    <br>
    <br>
    <br>

    <!--
        Displays: 
            - First Name
            - Last Name
            - Age
            - Grade in Fall
            - If Received Free Signup Book
            - If Received Finisher Prize
            - If Received Scholarship Raffle Ticket
            - Outreach Code 
    -->

    <div id="user-card" class="card text-center" style="width: 20rem;">
        <div class="card-body">
            <h3 class="card-title">
                <?php echo $_POST["firstname"] . " " . $_POST["lastname"];?>
            </h3>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Age: <?php echo $_POST["age"];?> 
            </li>
            <li class="list-group-item">
                <?php 
                    $adjustGrade = $_POST["gradeInFall"] - 1;
                    $actualGrade = "";  
                    if ($adjustGrade == -1) {
                        $actualGrade = "Pre-K"; 
                    } elseif ($adjustGrade == 0) {
                        $actualGrade = "K"; 
                    } elseif ($adjustGrade == 1) {
                        $actualGrade = "1st"; 
                    } elseif ($adjustGrade == 2) {
                        $actualGrade = "2nd"; 
                    } elseif ($adjustGrade == 3) {
                        $actualGrade = "3rd"; 
                    } else {
                        $actualGrade = $adjustGrade . "th"; 
                    }
                ?>
                Grade in Fall: <?php echo $actualGrade?>
            </li>
            <li class="list-group-item">
                <?php
                    $rfsb = isset($_POST['rfsb']); 
                    if ($rfsb) {
                        echo "Received Free Signup Book: Yes"; 
                    } else {
                        echo "Received Free Signup Book: No";
                    } 
                ?>
            </li>
            <li class="list-group-item">
                <?php
                    $rfp = isset($_POST['rfp']); 
                    if ($rfp) {
                        echo "Received Finisher Prize: Yes"; 
                    } else {
                        echo "Received Finisher Prize: No";
                    } 
                ?>
            </li>
            <li class="list-group-item">
                <?php
                    $rsrt = isset($_POST['rsrt']); 
                    if ($rsrt) {
                        echo "Received Scholarship Raffle Ticket: Yes"; 
                    } else {
                        echo "Received Scholarship Raffle Ticket: No";
                    } 
                ?>
            </li>
            <li class="list-group-item">
                <?php
                    $outreachCode = $_POST["outreachCode"];
                    if ($outreachCode == NULL) {
                        echo "Outreach Code: None Given."; 
                    } else {
                        echo "Outreach Code: " . $outreachCode; 
                    }
                ?>
            </li>
        </ul>
    </div>
    <br>
    <div style="text-align: center;">
        <a href="viewstudents.php" class="btn btn-info">Go to List</a>
    </br>

    <?php
        require_once "includes/footer.php"; 
    ?>